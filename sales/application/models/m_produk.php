<?php
class M_produk extends CI_Model{

	function get_all_produk(){
		$hsl=$this->db->query("SELECT * FROM tbl_produk");
		return $hsl;	
	}

	function get_produk_list($limit, $start){
        $query = $this->db->get('tbl_produk', $limit, $start);
        return $query;
	}
	
	function get_produk($keyword){
		$this->db->select('*');
		$this->db->from('tbl_produk');
		$this->db->like('produk_nama',$keyword);
		$this->db->or_like('produk_kategori_nama',$keyword);
		$this->db->or_like('produk_deskripsi',$keyword);
        $query = $this->db->get();
        return $query;
	}
	
	function get_produk_data($keyword, $limit, $start){
		$this->db->select('*');
		$this->db->like('produk_nama',$keyword);
		$this->db->or_like('produk_kategori_nama',$keyword);
		$this->db->or_like('produk_deskripsi',$keyword);
		$this->db->from('tbl_produk');
		$this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query;
    }

	function get_all_produk_stok(){
		$hsl=$this->db->query("SELECT produk_id,produk_nama,stok,produk_deskripsi,LEFT(produk_harga_lama,2) AS harga_lama,LEFT(produk_harga_baru,2) AS harga_baru,produk_harga_lama,produk_harga_baru,produk_likes,produk_kategori_id,produk_kategori_nama,produk_gambar FROM tbl_produk WHERE stok>0");
		return $hsl;	
	}

	function get_all_info(){
		$hsl=$this->db->query("select * from tbl_info");
		return $hsl;
	}

	function simpan_produk($nama,$deskripsi,$stok,$harga,$kategori,$kat_nama,$gambar){
		$hsl=$this->db->query("INSERT INTO tbl_produk (produk_nama,produk_deskripsi,stok,produk_harga_baru,produk_kategori_id,produk_kategori_nama,produk_gambar) VALUES ('$nama','$deskripsi','$stok','$harga','$kategori','$kat_nama','$gambar')");
		return $hsl;
	}

	//UPDATE produk DENGAN GAMBAR //
	function update_produk_tanpa_harga_baru($kode,$nama,$deskripsi,$stok,$harga_lama,$kategori,$kat_nama,$gambar){
		$hsl=$this->db->query("UPDATE tbl_produk set produk_nama='$nama',produk_deskripsi='$deskripsi',stok='$stok',produk_harga_baru='$harga_lama',produk_kategori_id='$kategori',produk_kategori_nama='$kat_nama',produk_gambar='$gambar' where produk_id='$kode'");
		return $hsl;
	}
	function update_produk_dengan_harga_baru($kode,$nama,$deskripsi,$stok,$harga_lama,$harga_baru,$kategori,$kat_nama,$gambar){
		$hsl=$this->db->query("UPDATE tbl_produk set produk_nama='$nama',produk_deskripsi='$deskripsi',stok='$stok',produk_harga_lama='$harga_lama',produk_harga_baru='$harga_baru',produk_kategori_id='$kategori',produk_kategori_nama='$kat_nama',produk_gambar='$gambar' where produk_id='$kode'");
		return $hsl;
	}
	//END EDIT produk DENGAN GAMBAR//

	//UPDATE produk TANPA GAMBAR//
	function update_produk_tanpa_harga_baru_tanpa_gambar($kode,$nama,$deskripsi,$stok,$harga_lama,$kategori,$kat_nama){
		$hsl=$this->db->query("UPDATE tbl_produk set produk_nama='$nama',produk_deskripsi='$deskripsi',stok='$stok',produk_harga_baru='$harga_lama',produk_kategori_id='$kategori',produk_kategori_nama='$kat_nama' where produk_id='$kode'");
		return $hsl;
	}
	function update_produk_dengan_harga_baru_tanpa_gambar($kode,$nama,$deskripsi,$stok,$harga_lama,$harga_baru,$kategori,$kat_nama){
		$hsl=$this->db->query("UPDATE tbl_produk set produk_nama='$nama',produk_deskripsi='$deskripsi',stok='$stok',produk_harga_lama='$harga_lama',produk_harga_baru='$harga_baru',produk_kategori_id='$kategori',produk_kategori_nama='$kat_nama' where produk_id='$kode'");
		return $hsl;
	}
	//END UPDATE produk TANPA GAMBAR//

	function hapus_produk($kode){
		$hsl=$this->db->query("DELETE FROM tbl_produk where produk_id='$kode'");
		return $hsl;
	}


	//MODEL UNTUK USER
	function hot_promo(){
		$hsl=$this->db->query("SELECT produk_id,produk_nama,produk_deskripsi,LEFT(produk_harga_lama,2) AS harga_lama,LEFT(produk_harga_baru,2) AS harga_baru,produk_harga_lama,produk_harga_baru,produk_likes,produk_kategori_id,produk_kategori_nama,produk_gambar FROM tbl_produk WHERE (produk_harga_lama-produk_harga_baru)>=0 ORDER BY (produk_harga_lama-produk_harga_baru) DESC LIMIT 3 ");
		return $hsl;
	}

	function makanan(){
		$hsl=$this->db->query("SELECT produk_id,produk_nama,produk_deskripsi,LEFT(produk_harga_lama,2) AS harga_lama,LEFT(produk_harga_baru,2) AS harga_baru,produk_harga_lama,produk_harga_baru,produk_likes,produk_kategori_id,produk_kategori_nama,produk_gambar FROM tbl_produk WHERE produk_kategori_id='1' ORDER BY produk_id DESC");
		return $hsl;
	}
	function minuman(){
		$hsl=$this->db->query("SELECT produk_id,produk_nama,produk_deskripsi,LEFT(produk_harga_lama,2) AS harga_lama,LEFT(produk_harga_baru,2) AS harga_baru,produk_harga_lama,produk_harga_baru,produk_likes,produk_kategori_id,produk_kategori_nama,produk_gambar FROM tbl_produk WHERE produk_kategori_id='2' ORDER BY produk_id DESC");
		return $hsl;
	}
	function favorite(){
		$hsl=$this->db->query("SELECT produk_id,produk_nama,produk_deskripsi,LEFT(produk_harga_lama,2) AS harga_lama,LEFT(produk_harga_baru,2) AS harga_baru,produk_harga_lama,produk_harga_baru,produk_likes,produk_kategori_id,produk_kategori_nama,produk_gambar FROM tbl_produk WHERE stok <> 0 ORDER BY stok DESC LIMIT 6");
		return $hsl;
	}

	function detail_produk($kode){
		$hsl=$this->db->query("SELECT tbl_produk.*,LEFT(produk_harga_lama,2) AS harga_lama,LEFT(produk_harga_baru,2) AS harga_baru FROM tbl_produk where produk_id='$kode'");
		return $hsl;	
	}

	function add_like($kode){
		$hsl=$this->db->query("UPDATE tbl_produk SET produk_likes=produk_likes+1 where produk_id='$kode'");
		return $hsl;	
	}


	//END MODEL UNTUK MOBILE

}