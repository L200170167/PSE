<?php
class Template{
    protected $_ci;
    
    function __construct(){
        $this->_ci = &get_instance();
    }
    
    function website($content, $data = NULL){
    /*
     * $data['headernya'] , $data['contentnya'] , $data['footernya']
     * variabel diatas ^ nantinya akan dikirim ke file views/template/index.php
     * */
        $data['head'] = $this->_ci->load->view('user/_template/v_head', $data, TRUE);
        $data['header'] = $this->_ci->load->view('user/_template/v_header', $data, TRUE);
        $data['content'] = $this->_ci->load->view($content, $data, TRUE);
        $data['footer'] = $this->_ci->load->view('user/_template/v_footer', $data, TRUE);
        $data['js'] = $this->_ci->load->view('user/_template/v_js', $data, TRUE);
        
        $this->_ci->load->view('user/_template/v_index', $data);
    }

    function modal($content, $data = NULL){
        /*
         * $data['headernya'] , $data['contentnya'] , $data['footernya']
         * variabel diatas ^ nantinya akan dikirim ke file views/template/index.php
         * */
            $data['head'] = $this->_ci->load->view('user/_template/v_head', $data, TRUE);
            $data['header'] = $this->_ci->load->view('user/_template/v_header', $data, TRUE);
            $data['content'] = $this->_ci->load->view($content, $data, TRUE);
            $data['footer'] = $this->_ci->load->view('user/_template/v_footer', $data, TRUE);
            $data['modal'] = $this->_ci->load->view('user/_template/v_modal', $data, TRUE);
            $data['js'] = $this->_ci->load->view('user/_template/v_js', $data, TRUE);
            
            $this->_ci->load->view('user/_template/v_modals', $data);
    }
    
    function admin($content, $data = NULL){
    /*
     * $data['headernya'] , $data['contentnya'] , $data['footernya']
     * variabel diatas ^ nantinya akan dikirim ke file views/template/index.php
     * */
        $data['head'] = $this->_ci->load->view('admin/_template/v_head', $data, TRUE);
        $data['header'] = $this->_ci->load->view('admin/_template/v_header', $data, TRUE);
        $data['sidebar'] = $this->_ci->load->view('admin/_template/v_sidebar', $data, TRUE);
        $data['content'] = $this->_ci->load->view($content, $data, TRUE);
        $data['footer'] = $this->_ci->load->view('admin/_template/v_footer', $data, TRUE);
        $data['js'] = $this->_ci->load->view('admin/_template/v_js', $data, TRUE);
        
        $this->_ci->load->view('admin/_template/v_index', $data);
    }
    
}