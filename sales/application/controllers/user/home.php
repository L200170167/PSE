<?php
class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_produk');
		$this->load->model('m_pesan');
		$this->load->library('template');
	}


	function index(){
		//$x['kat']=$this->m_kategori->get_all_kategori();
		$x['data']=$this->m_produk->hot_promo();
		$x['fav']=$this->m_produk->favorite();
		$x['modal']=$this->m_produk->get_all_produk();
		$x['info']=$this->m_produk->get_all_info();
		$this->template->modal('user/v_home',$x);
	}

	function kontak(){
		$x['info']=$this->m_produk->get_all_info();
		$this->template->website('user/v_kontak',$x);
	}

	function kirim_pesan(){
		$nama=$this->input->post('nama');
		$email=$this->input->post('email');
		$subjek=$this->input->post('subjek');
		$isi=$this->input->post('isi');
		$this->m_pesan->simpan_pesan($nama,$email,$subjek,$isi);
	    echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Pesan <b>'.$nama.'</b> Berhasil dikirim ke database.</div>');
	    redirect('contact');
	}

	function search(){
		$keyword=$this->input->post('keyword');
		$cadmin=$this->m_produk->get_produk($keyword);
        
        if($cadmin->num_rows > 0){
		
		//konfigurasi pagination
		$config['base_url'] = site_url('shop'); //site url
		$this->db->like('produk_nama',$keyword);
		$this->db->or_like('produk_kategori_nama',$keyword);
		$this->db->or_like('produk_deskripsi',$keyword);
		$this->db->from('tbl_produk');
        $config['total_rows'] = $this->db->count_all_results(); //total row
        $config['per_page'] = 6;  //show record per halaman
        $config["uri_segment"] = 2;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['full_tag_open'] = '<ul class="quicky-pagination-box">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_open'] = '<li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_open'] = '<li>';
 
		$this->pagination->initialize($config);
		
		$x['page'] = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
 
        //panggil function get_produk_list yang ada pada mmodel produk. 
        $x['data'] = $this->m_produk->get_produk_data($keyword, $config["per_page"], $x['page']);           
 
		$x['pagination'] = $this->pagination->create_links();
		$x['info']=$this->m_produk->get_all_info();
		$x['modal']=$this->m_produk->get_all_produk();
		$this->template->modal('user/v_produk',$x);
		} else {
		$x['info']=$this->m_produk->get_all_info();
		$this->template->website('user/v_notfound',$x);
		}
	}

}