<?php
class Info extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_info');
		$this->load->model('m_pengguna');
		$this->load->model('m_pesan');
		$this->load->library('template');
	}

	function index(){
		$kode=$this->session->userdata('idadmin');
		$x['user']=$this->m_pengguna->get_pengguna_login($kode);
		$x['data']=$this->m_info->get_all_info();
		$x['psn']=$this->m_pesan->get_all_pesan();
		$this->template->admin('admin/v_info',$x);
	}

	function update_info(){
		$id=$this->input->post('id');
		$nama=$this->input->post('nama');
		$diskripsi=$this->input->post('diskripsi');
		$penjelasan=$this->input->post('penjelasan');
		$alamat=$this->input->post('alamat');
		$nohp=$this->input->post('nohp');
		$email=$this->input->post('email');
		$google=$this->input->post('google');
		$fb=$this->input->post('fb');
		$twitter=$this->input->post('twitter');
		$this->m_info->update_info($id,$nama,$diskripsi,$penjelasan,$alamat,$nohp,$email,$google,$fb,$twitter);
		echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Info Website <b>Profil</b> Berhasil diupdate.</div>');
	    redirect('admin/info');
	}


}