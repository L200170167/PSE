<?php
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_pengguna');
		$this->load->model('m_pelanggan');
		$this->load->model('m_order');
		$this->load->model('m_pesan');
		$this->load->library('template');
	}

	function index(){
		$kode=$this->session->userdata('idadmin');
		$x['user']=$this->m_pengguna->get_pengguna_login($kode);
		$x['plg']=$this->m_pelanggan->get_all_pelanggan_terbaru();
		$x['psn']=$this->m_pesan->get_all_pesan();
		$x['psnb']=$this->m_pesan->get_all_pesan_terbaru();
		$x['odr']=$this->m_order->get_all_order();
		$x['pen_now']=$this->m_order->get_total_penjualan_sekarang();
		$x['pen_last']=$this->m_order->get_total_penjualan_bulan_lalu();
		$x['tot_jumlah']=$this->m_order->get_total_jumlah_terjual_bulan_ini();
		$x['tot_plg']=$this->m_order->get_tatal_pelanggan();
		$this->template->admin('admin/v_dashboard',$x);
	}

}