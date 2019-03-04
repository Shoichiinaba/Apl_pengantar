<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas_c extends AUTH_Controller {
	var $template='template/index';

	function __construct(){
		parent::__construct();
		$this->load->model('petugas_m');
		$this->load->model('M_admin');
		$this->load->helper('url');
		
	}
	function index()
	{	
		$data['list']=$this->petugas_m->get_petugas();
		$data['nomer']= $this->petugas_m->PTGS();
		$data['userdata'] 	= $this->userdata;
		$data['content'] = 'admin/petugas';
        $this->load->view($this->template, $data);	
	}

	function simpan()
	{	$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		if($this->input->post()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Inputkan");
			redirect('petugas_c');
		}else{
				$id_petugas=$this->input->post('id_petugas');
				$nama=$this->input->post('nama');
				$alamat=$this->input->post('alamat');
				$rt=$this->input->post('rt');
				$rw=$this->input->post('rw');
				$no_tel=$this->input->post('no_tel');
				$email=$this->input->post('email');
				$jabatan=$this->input->post('jabatan');
				
			}
		$this->petugas_m->kirim($id_petugas,$nama,$alamat,$rt,$rw,$no_tel,$email,$jabatan);
		$this->session->set_flashdata('sukses',"Baru Berhasil Diinput");
		redirect('petugas_c');	
	}

	function hapus($params = '') {
        $this->petugas_m->delete($params);
        $this->session->set_flashdata('sukses',"Berhasil Di Hapus");
        return redirect('petugas_c');
    }

    function edit() {
    	$this->form_validation->set_rules('email', 'email', 'required|valid_email');
    	if($this->input->post()==FALSE){
			$this->session->set_flashdata('error',"Data Anda Gagal Di Edit");
			redirect('petugas_c');
		}else{

        $id_petugas = $this->input->post('id_petugas');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $rt = $this->input->post('rt');
        $rw = $this->input->post('rw');
        $no_tel = $this->input->post('no_tel');
        $email = $this->input->post('email');
        $jabatan = $this->input->post('jabatan');

	       }

        $troop_ = array(
         'id_petugas'  => $id_petugas,
         'nama'  => $nama,
         'alamat' => $alamat,
         'rt' => $rt,
         'rw' =>  $rw,
         'no_tel'  => $no_tel,
         'email' => $email,
         'jabatan' => $jabatan,
      );
    
        
         $this->petugas_m->ubah($id_petugas, $troop_);
         $this->session->set_flashdata('sukses',"Berhasil Diedit");
        return redirect('petugas_c');
    }
}