<?php
class Member extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_pelanggan');
		$this->load->library('upload');
    }
    
    function simpan_pelanggan(){
        $nama=strip_tags(str_replace("'", "", $this->input->post('nama')));
        $email=strip_tags(str_replace("'", "", $this->input->post('email')));
        $cemail=$this->m_pelanggan->cek_email($email);
        $pass=strip_tags(str_replace("'", "", $this->input->post('pass')));
        $pass2=strip_tags(str_replace("'", "", $this->input->post('pass2')));
        if ($pass <> $pass2) {
            echo $this->session->set_flashdata('register','<div class="notifications warning">Password dan Ulangi Password yang Anda masukan tidak sama.</div></br>');
            redirect('user/home');
        }else if ($cemail->num_rows > 0) {
            echo $this->session->set_flashdata('register','<div class="notifications warning">Email yang Anda masukan sudah didaftarkan.</div></br>');
            redirect('user/home');
        }else{
            $this->m_pelanggan->simpan_pelanggan($nama,$email,$pass);
            echo $this->session->set_flashdata('login','<div class="notifications success"><b>'.$nama.'</b> berhasil didaftarkan. Silahkan login untuk melakukan pemesanan</div></br>');
            redirect('user/home');
        }

        
    }

    function update_pelanggan(){
        $nama=strip_tags(str_replace("'", "", $this->input->post('nama')));
        $email=strip_tags(str_replace("'", "", $this->input->post('email')));
        $alamat=strip_tags(str_replace("'", "", $this->input->post('alamat')));
        $nohp=strip_tags(str_replace("'", "", $this->input->post('phone')));
        $passlama=strip_tags(str_replace("'", "", $this->input->post('passlama')));
        $pass=strip_tags(str_replace("'", "", $this->input->post('passbaru')));
        $pass2=strip_tags(str_replace("'", "", $this->input->post('passdoang')));
        $id=$this->session->userdata('kopel');
        $cadmin=$this->m_pelanggan->cek_pelanggan($this->session->userdata('email_pel'),$passlama);
        $cemail=$this->m_pelanggan->cek_email($email);
        if ($pass <> $pass2) {
            echo $this->session->set_flashdata('msg','<div class="notifications warning">Password dan Ulangi Password yang Anda masukan tidak sama.</div></br>');
            redirect('account');
        }else if ($cemail->num_rows > 0 && $email !==$this->session->userdata('email_pel')) {
            echo $this->session->set_flashdata('msg','<div class="notifications warning">Email yang Anda masukan sudah didaftarkan.</div></br>');
            redirect('account');
        }else if ($pass == "" || $pass2 == "") {
            $this->m_pelanggan->update_pelanggan_nopas($nama,$email,$alamat,$nohp,$id);
            echo $this->session->set_flashdata('msg','<div class="notifications success">Data <b>'.$nama.'</b> Berhasil di simpan ke database.</div></br>');
            redirect('account');
        }else if ($cadmin->num_rows > 0) {
            $this->m_pelanggan->update_pelanggan($nama,$email,$alamat,$nohp,$pass,$id);
            echo $this->session->set_flashdata('msg','<div class="notifications success">Data <b>'.$nama.'</b> Berhasil di simpan ke database.</div></br>');
            redirect('account');
        }else{
            echo $this->session->set_flashdata('msg','<div class="notifications warning">Password Lama yang Anda masukan tidak sama.</div></br>');
            redirect('account');
        }

        
    }

	function auth(){
        $u=strip_tags(str_replace("'", "", $this->input->post('email')));
        $p=strip_tags(str_replace("'", "", $this->input->post('password')));
        $cadmin=$this->m_pelanggan->cek_pelanggan($u,$p);
        if($cadmin->num_rows > 0){
         $this->session->set_userdata('online',true);
         $this->session->set_userdata('pengguna',$u);
         $xcadmin=$cadmin->row_array();
         $this->session->set_userdata('nama_pel',$xcadmin['plg_nama']); 
         $this->session->set_userdata('kopel',$xcadmin['plg_id']); 
         $this->session->set_userdata('email_pel',$xcadmin['plg_email']); 
        }else{
                $this->session->set_userdata('online',false);
        }
        if($this->session->userdata('online')==true){
            redirect('user/member/berhasillogin');
        }else{
            redirect('user/member/gagallogin');
        }
    }

    function berhasillogin(){
            if(empty($this->cart->total_items())){
                $kopel=$this->session->userdata('kopel');
                $this->db->query("update tbl_pelanggan set plg_status='1' where plg_id='$kopel'");
                redirect('shop');
            }else{
                redirect('shop/cart');
            }
            
    }

    function gagallogin(){
            $url=base_url('user/home');
            echo $this->session->set_flashdata('login','<div class="notifications error"><i class="fa fa-exclamation-circle"></i> Email atau Password yang anda masukan salah. Mohon Check Kembali!</div></br>');
            redirect($url);
    }
    
    function logout(){
            $kopel=$this->session->userdata('kopel');
            $this->db->query("update tbl_pelanggan set plg_status='0' where plg_id='$kopel'");
            $this->session->sess_destroy();
            $url=base_url('user/home');
            redirect($url);
    }


}