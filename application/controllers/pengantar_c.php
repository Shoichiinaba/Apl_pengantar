<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pengantar_c extends CI_Controller {
	var $template='template/index';

	function __construct(){
		parent::__construct();
		$this->load->model('pengan_m');
		$this->load->model('nomer_m');
		$this->load->helper(array('url'));
		
	}
	function index()
	{	
		$data['content'] = 'template/dashboard';
		$data['nomer']= $this->nomer_m->PNTR();
        $this->load->view($this->template, $data);
	}
	
	

	function simpan()
	{
		if($this->input->post()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Inputkan");
			redirect('pengantar_c');
		}else{
				$no_pengantar=$this->input->post('no_pengantar');	
				$Keperluan=$this->input->post('keperluan');
				$Lain_lain=$this->input->post('lain_lain');
				$NIK=$this->input->post('NIK');
				$status_rt=$this->input->post('status_rt');
				$status_rw=$this->input->post('status_rw');
			}
		$this->pengan_m->simpan($no_pengantar,$Keperluan,$Lain_lain,$NIK,$status_rt,$status_rw);
		$this->session->set_flashdata('sukses'," Berhasil Dibuat");
		redirect('pengantar_c');
	}

	function search(){
		$NIK=$this->input->get('NIK');
		$data['content'] = 'search_view';
		$data['data']=$this->pengan_m->search_pengantar($NIK);
		$this->load->view($this->template,$data);
		
	}

	function get_autocomplete(){
		if (isset($_GET['term'])) {
		  	$result = $this->pengan_m->search_pengantar($_GET['term']);
		   	if (count($result) > 0) {
		    foreach ($result as $row)
		     	$arr_result[] = array(
					'label'	=> $row->blog_title,
				);
		     	echo json_encode($arr_result);
		   	}
		}
	}
}
