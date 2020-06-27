<?php
class M_pelanggan extends CI_Model{

	function get_all_pelanggan(){
		$hsl=$this->db->query("select * from tbl_pelanggan order by plg_id desc");
		return $hsl;
	}

	function cek_pelanggan($u,$p){
		$hsl=$this->db->query("select * from tbl_pelanggan where plg_email='$u' and plg_password=md5('$p')");
		return $hsl;
	}

	function cek_email($u){
		$hsl=$this->db->query("select * from tbl_pelanggan where plg_email='$u'");
		return $hsl;
	}

	function cek_profil($id){
		$hsl=$this->db->query("select * from tbl_pelanggan where plg_id='$id'");
		return $hsl;
	}

	function simpan_pelanggan($nama,$email,$pass){
		$hsl=$this->db->query("INSERT INTO tbl_pelanggan(plg_nama,plg_email,plg_password) VALUES ('$nama','$email',md5('$pass'))");
		return $hsl;
	}

	function update_pelanggan_nopas($nama,$email,$alamat,$nohp,$id){
		$hsl=$this->db->query("UPDATE tbl_pelanggan set plg_nama='$nama',plg_email='$email',plg_alamat='$alamat',plg_notelp='$nohp' where plg_id='$id'");
		return $hsl;
	}
	
	function update_pelanggan($nama,$email,$alamat,$nohp,$pass,$id){
		$hsl=$this->db->query("UPDATE tbl_pelanggan set plg_nama='$nama',plg_email='$email',plg_alamat='$alamat',plg_notelp='$nohp',plg_password=md5('$pass') where plg_id='$id'");
		return $hsl;
	}

	function hapus_pelanggan($kode){
		$hsl=$this->db->query("delete from tbl_pelanggan where plg_id='$kode'");
		return $hsl;
	}

	function get_all_pelanggan_terbaru(){
		$hsl=$this->db->query("select * from tbl_pelanggan order by plg_id desc");
		return $hsl;
	}

}