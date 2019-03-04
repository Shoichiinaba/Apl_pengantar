<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cetak extends AUTH_Controller {
	var $template='template/index';

	public function __construct(){
		parent::__construct();
		$this->load->model('validasi_m');
		$this->load->helper('url');

		
		
	}
	function index()
	{
		
	}
	function cetakarsip()
    {
        $data['content'] = 'admin/cari_cetak';
        $data['userdata']   = $this->userdata;
        $this->load->view($this->template, $data);  
    }
	
    function search(){
		$no_pengantar=$this->input->get('no_pengantar');
		$data['content'] = 'admin/tampil_cetak';
		$data['userdata']   = $this->userdata;
		$data['cetak']=$this->validasi_m->search_pengantar($no_pengantar);
		$this->load->view($this->template,$data);
	}
}
