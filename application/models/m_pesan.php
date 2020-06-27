<?php
class M_pesan extends CI_Model{

	function get_all_pesan_terbaru(){
		$hsl=$this->db->query("select * from tbl_pesan order by id desc");
		return $hsl;
	}

	function simpan_pesan($nama,$email,$subjek,$isi){
		$hsl=$this->db->query("INSERT INTO tbl_pesan(nama,email,subjek,isi) VALUES ('$nama','$email','$subjek','$isi')");
		return $hsl;
	}
	
	function update_pesan($id){
		$hsl=$this->db->query("UPDATE tbl_pesan set status='1' where id='$id'");
		return $hsl;
	}

	function hapus_pesan($kode){
		$hsl=$this->db->query("delete from tbl_pesan where id='$kode'");
		return $hsl;
	}

	function get_all_pesan(){
		$hsl=$this->db->query("select * from tbl_pesan where status='0' order by id desc");
		return $hsl;
	}

}