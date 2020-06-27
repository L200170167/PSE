<?php
class M_kategori extends CI_Model{

	function get_all_kategori(){
		$hsl=$this->db->query("select * from tbl_kategori");
		return $hsl;
	}

	function get_all_bb(){
		$hsl=$this->db->query("select * from tbl_bb");
		return $hsl;
	}

	function simpan_kategori($kategori){
		$hsl=$this->db->query("insert into tbl_kategori (kategori_nama) values ('$kategori')");
		return $hsl;
	}
	function update_kategori($kode,$kategori){
		$hsl=$this->db->query("update tbl_kategori set kategori_nama='$kategori' where kategori_id='$kode'");
		return $hsl;
	}
	function hapus_kategori($kode){
		$hsl=$this->db->query("delete from tbl_kategori where kategori_id='$kode'");
		return $hsl;
	}
	function simpan_bb($nama,$satuan,$harga){
		$hsl=$this->db->query("insert into tbl_bb (nama_bb,satuan,harga) values ('$nama','$satuan','$harga') ");
		return $hsl;
	}
	function update_bb($kode,$nama,$satuan,$harga){
		$hsl=$this->db->query("update tbl_bb set nama_bb='$nama',satuan='$satuan',harga='$harga' where id_bb='$kode'");
		return $hsl;
	}
	function hapus_bb($kode){
		$hsl=$this->db->query("delete from tbl_bb where id_bb='$kode'");
		return $hsl;
	}
	function get_kategori_by_id($kategori){
		$hsl=$this->db->query("select * from tbl_kategori where kategori_id='$kategori'");
		return $hsl;
	}

}