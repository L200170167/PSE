<?php
class Pesan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_pesan');
		$this->load->model('m_pengguna');
		$this->load->model('m_pesan');
		$this->load->library('template');
	}


	function index(){
		$kode=$this->session->userdata('idadmin');
		$x['user']=$this->m_pengguna->get_pengguna_login($kode);
		$x['data']=$this->m_pesan->get_all_pesan();
		$x['psn']=$this->m_pesan->get_all_pesan();
		$this->template->admin('admin/v_pesan',$x);
	}

	function update_pesan(){
		$id=$this->input->post('id');
		$this->m_pesan->update_pesan($id);
	    echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Pesan <b>'.$nama.'</b> Berhasil dibaca dari database.</div>');
	    redirect('admin/pesan');
	}

	function hapus_pesan(){
		$kode=$this->input->post('kode');
		$nama=$this->input->post('nama');
		$this->m_pesan->hapus_pesan($kode);
	    echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Pelanggan <b>'.$nama.'</b> Berhasil dihapus dari database.</div>');
	    redirect('admin/pesan');
	}

}