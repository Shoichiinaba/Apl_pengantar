<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	var $template='template/index';

	function __construct(){
		parent::__construct();
		$this->load->model('pengan_m');
		$this->load->model('nomer_m');
		$this->load->helper('url');
		
	}
	function index()
	{
		$data=array(
			"content"=>'template/dashboard',
			"nomer"=> $this->nomer_m->PNTR()
		);
        $this->load->view($this->template, $data);

		
	}
	

	function get_nik(){
		$NIK=$this->input->post('NIK');
		$data=$this->pengan_m->get_data_nik($NIK);
		echo json_encode($data);
	}
	function search(){
		$NIK=$this->input->get('NIK');
		$data['content'] = 'search_view';
		$data['data']=$this->pengan_m->search_pengantar($NIK);
		$this->load->view($this->template,$data);
		
	}
}
