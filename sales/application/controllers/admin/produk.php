<?php
class Produk extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_produk');
		$this->load->model('m_kategori');
		$this->load->library('upload');
		$this->load->model('m_pengguna');
		$this->load->model('m_pesan');
		$this->load->library('template');
	}


	function index(){
		$kode=$this->session->userdata('idadmin');
		$x['user']=$this->m_pengguna->get_pengguna_login($kode);
		$x['kat']=$this->m_kategori->get_all_kategori();
		$x['data']=$this->m_produk->get_all_produk();
		$x['psn']=$this->m_pesan->get_all_pesan();
		$this->template->admin('admin/v_produk',$x);
	}

	function simpan_produk(){
				$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
	            $config['upload_path'] = './assets/gambar/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
				$config['file_name'] = $nmfile; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        $gambar=$gbr['file_name'];
	                        $nama=str_replace("'", "", $this->input->post('nama'));
	                        $deskripsi=str_replace("'", "", $this->input->post('deskripsi'));
	               			$stok=str_replace("'", "", $this->input->post('stok'));
	                        $harga=str_replace("'", "", $this->input->post('harga'));
	                        $kategori=str_replace("'", "", $this->input->post('kategori'));
                            $a=$this->m_kategori->get_kategori_by_id($kategori);
                            $q=$a->row_array();
                            $kat_nama=$q['kategori_nama'];
	               			$this->m_produk->simpan_produk($nama,$deskripsi,$stok,$harga,$kategori,$kat_nama,$gambar);
	                    	echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>produk <b>'.$nama.'</b> Berhasil ditambahkan ke database.</div>');
	               			redirect('admin/produk');
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>produk tidak dapat ditambahkan, file gambar yang Anda masukkan terlalu besar.</div>');
	                    redirect('admin/produk');
	                }
	                 redirect('admin/produk');
	            }else{
	               	redirect('admin/produk');
	            } 

	}

	function update_produk(){
				$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
	            $config['upload_path'] = './assets/gambar/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['file_name'] = $nmfile; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        $gambar=$gbr['file_name'];
	                        $kode=str_replace("'", "", $this->input->post('kode'));
	                        $nama=str_replace("'", "", $this->input->post('nama'));
	                        $deskripsi=str_replace("'", "", $this->input->post('deskripsi'));
			                $stok=str_replace("'", "", $this->input->post('stok'));
	                        $harga_lama=str_replace("'", "", $this->input->post('harga_lama'));
	                        $harga_baru=str_replace("'", "", $this->input->post('harga_baru'));
	                        $kategori=str_replace("'", "", $this->input->post('kategori'));
                            $a=$this->m_kategori->get_kategori_by_id($kategori);
                            $q=$a->row_array();
                            $kat_nama=$q['kategori_nama'];

                            
     						if (empty($harga_baru)) {
     							$this->m_produk->update_produk_tanpa_harga_baru($kode,$nama,$deskripsi,$stok,$harga_lama,$kategori,$kat_nama,$gambar);
	                    		echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>produk <b>'.$nama.'</b> Berhasil diupdate.</div>');
	               				redirect('admin/produk');
     						}else{
	               				$this->m_produk->update_produk_dengan_harga_baru($kode,$nama,$deskripsi,$stok,$harga_lama,$harga_baru,$kategori,$kat_nama,$gambar);
	                    		echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>produk <b>'.$nama.'</b> Berhasil diupdate.</div>');
	               				redirect('admin/produk');
	               			}
	                    
	                }else{
	                    echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>produk tidak dapat diupdate, file gambar yang Anda masukkan terlalu besar.</div>');
	                    redirect('admin/produk');
	                }
	                 redirect('admin/produk');
	            }else{
	            	$kode=str_replace("'", "", $this->input->post('kode'));
	                $nama=str_replace("'", "", $this->input->post('nama'));
	                $deskripsi=str_replace("'", "", $this->input->post('deskripsi'));
	                $stok=str_replace("'", "", $this->input->post('stok'));
	                $harga_lama=str_replace("'", "", $this->input->post('harga_lama'));
	                $harga_baru=str_replace("'", "", $this->input->post('harga_baru'));
	                $kategori=str_replace("'", "", $this->input->post('kategori'));
                    $a=$this->m_kategori->get_kategori_by_id($kategori);
                    $q=$a->row_array();
                    $kat_nama=$q['kategori_nama'];

	            	if (empty($harga_baru)) {
     					$this->m_produk->update_produk_tanpa_harga_baru_tanpa_gambar($kode,$nama,$deskripsi,$stok,$harga_lama,$kategori,$kat_nama);
	                	echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>produk <b>'.$nama.'</b> Berhasil diupdate.</div>');
	               		redirect('admin/produk');
     				}else{
	               		$this->m_produk->update_produk_dengan_harga_baru_tanpa_gambar($kode,$nama,$deskripsi,$stok,$harga_lama,$harga_baru,$kategori,$kat_nama);
	                	echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>produk <b>'.$nama.'</b> Berhasil diupdate.</div>');
	               		redirect('admin/produk');
	               	}
	            } 

	}

	function hapus_produk(){
		$kode=$this->input->post('kode');
		$nama=$this->input->post('kategori');
		$this->m_produk->hapus_produk($kode);
	    echo $this->session->set_flashdata('msg','<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>produk <b>'.$nama.'</b> Berhasil dihapus dari database.</div>');
	    redirect('admin/produk');
	}



}