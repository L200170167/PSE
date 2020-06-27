<?php
class M_Info extends CI_Model{

	function get_all_info(){
		$hsl=$this->db->query("select * from tbl_info");
		return $hsl;
	}
	function update_info($id,$nama,$diskripsi,$penjelasan,$alamat,$nohp,$email,$google,$fb,$twitter){
		$hsl=$this->db->query("update tbl_info set nama='$nama',diskripsi='$diskripsi',penjelasan='$penjelasan',alamat='$alamat',nohp='$nohp',email='$email',google='$google', fb='$fb', twitter='$twitter'  where id='$id'");
		return $hsl;
	}
	function get_kategori_by_id($kategori){
		$hsl=$this->db->query("select * from tbl_kategori where kategori_id='$kategori'");
		return $hsl;
	}

}