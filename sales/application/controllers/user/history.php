<?php
class History extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('online') !=TRUE){
            echo $this->session->set_flashdata('login','<div class="notifications success">Lakukan login dulu untuk melihat aktifitas akun.</div></br>');
			redirect('user/home');
        };
		$this->load->model('m_order');
		$this->load->model('m_produk');
		$this->load->model('m_pelanggan');
		$this->load->library('template');
	}

	function index(){
		$kopel=$this->session->userdata('kopel');
		$x['data']=$this->m_order->get_myhistory($kopel);
		$x['info']=$this->m_produk->get_all_info();
		$this->template->website('user/v_history',$x);
	}

	function akun(){
		$kopel=$this->session->userdata('kopel');
		$x['data']=$this->m_pelanggan->cek_profil($kopel);
		$x['info']=$this->m_produk->get_all_info();
		$this->template->website('user/v_akun',$x);
	}

	function get_invoice(){
		$invoice=$this->input->get('ids');
		$data=$this->m_order->invoice_list($invoice);
		echo json_encode($data);
	}

	function get_total_invoice(){
		$invoice=$this->input->get('ids');
		$data=$this->m_order->get_total_invoice($invoice);
		echo json_encode($data);
	}
}