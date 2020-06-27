<?php
class Produk extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_produk');
		$this->load->model('m_order');
		$this->load->library('template');
	}


	function index(){
		//konfigurasi pagination
        $config['base_url'] = site_url('shop'); //site url
        $config['total_rows'] = $this->db->count_all('tbl_produk'); //total row
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
		
		$data['page'] = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
 
        //panggil function get_produk_list yang ada pada mmodel produk. 
        $data['data'] = $this->m_produk->get_produk_list($config["per_page"], $data['page']);           
 
		$data['pagination'] = $this->pagination->create_links();
		
		$data['judul']="HOT PROMO";
		
		$data['modal']=$this->m_produk->get_all_produk();
		$data['info']=$this->m_produk->get_all_info();
		$this->template->modal('user/v_produk',$data);
	}

	function detail_produk(){
		$kode=$this->uri->segment(4);
		$x['info']=$this->m_produk->get_all_info();
		$x['data']=$this->m_produk->detail_produk($kode);
		$this->template->website('user/v_detail_produk',$x);
	}

	function add_to_cart(){
		$kode=$this->uri->segment(4);
		$jumlah = $this->input->post('jumlah');
		if ($jumlah == '') {
			$qty = 1;
		} else {
			$qty = $jumlah;
		}
		$produk=$this->m_produk->detail_produk($kode);
		$i=$produk->row_array();
		$data = array(
               'id'      => $i['produk_id'],
               'qty'     => $qty,
               'price'   => $i['produk_harga_baru'],
               'name'    => $i['produk_nama'],
               'image'	=> $i['produk_gambar']
               
            );

		$this->cart->insert($data); 
		redirect('shop');
	}

	function cart(){
		$x['info']=$this->m_produk->get_all_info();
		$this->template->website('user/v_cart',$x);	
	}

	function remove(){
		$row_id=$this->uri->segment(4);
		$this->cart->update(array(
               'rowid'      => $row_id,
               'qty'     => 0
            ));
		redirect('user/produk/cart');
	}

	function removecart(){
		$row_id=$this->uri->segment(4);
		$this->cart->update(array(
               'rowid'      => $row_id,
               'qty'     => 0
            ));
		redirect('shop');
	}

	function update(){
		$this->cart->update($_POST);
        redirect('user/produk/cart');
	}

	function check_out(){
		if($this->session->userdata('online') !=TRUE){
			echo $this->session->set_flashdata('login','<div class="notifications success">Lakukan login dulu saat melakukan proses check out.</div></br>');
			redirect('user/home');
            }else{
            	$no_invoice=$this->m_order->get_invoice();
				$total=$this->cart->total();
				if ($total!==0) {
					$this->session->set_userdata('no_invoice',$no_invoice);
					$order_proses=$this->m_order->order_produk($no_invoice,$total);
					if($order_proses){
						$this->cart->destroy();
						redirect('history');
					}else{
						redirect('shop/cart');
					}
				} else {
					redirect('shop/cart');
				}
            }
		
	}


}