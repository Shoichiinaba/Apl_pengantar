<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends AUTH_Controller {
	var $template='template/index';
	public function __construct() {
		parent::__construct();
		$this->load->model('M_admin');
	}

	 function index() {
		$data['userdata'] 		= $this->userdata;
		
		$data['page'] 			= "profile";
		$data['judul'] 			= "Profile";
		$data['deskripsi'] 		= "Setting Profile";
		$data['content'] 		= "admin/profile";
        $this->load->view($this->template, $data);	
	}

	public function update() {
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[15]');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');

		$id = $this->userdata->id;
		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/img/';
			$config['allowed_types'] = 'jpg|png';
			
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('foto')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data_foto = $this->upload->data();
				$data['foto'] = $data_foto['file_name'];
			}

			$result = $this->M_admin->update($data, $id);
			if ($result > 0) {
				$this->updateProfil();
				$this->session->set_flashdata('sukses',"Berhasil diubah");
				redirect('Profile');
			} else {
				$this->session->set_flashdata('error',"Profile Gagal diubah");
				redirect('Profile');
			}
		} else {
			$this->session->set_flashdata('error',(validation_errors()));
			redirect('Profile');
		}
	}

	public function ubah_password() {
		$this->form_validation->set_rules('passLama', 'Password Lama', 'trim|required');
		$this->form_validation->set_rules('passBaru', 'Password Baru', 'trim|required');
		$this->form_validation->set_rules('passKonf', 'Password Konfirmasi', 'trim|required');

		$id = $this->userdata->id;
		if ($this->form_validation->run() == TRUE) {
			if (md5($this->input->post('passLama')) == $this->userdata->password) {
				if ($this->input->post('passBaru') != $this->input->post('passKonf')) {
					$this->session->set_flashdata('error',"Password Baru dan Konfirmasi Password harus sama");
					redirect('Profile');
				} else {
					$data = [
						'password' => md5($this->input->post('passBaru'))
					];

					$result = $this->M_admin->update($data, $id);
					if ($result > 0) {
						$this->updateProfil();
						$this->session->set_flashdata('pas',"Berhasil diubah");
						redirect('Profile');
					} else {
						$this->session->set_flashdata('error', "Password Gagal diubah");
						redirect('Profile');
					}
				}
			} else {
				$this->session->set_flashdata('error', "Password Salah");
				redirect('Profile');
			}
		} else {
			$this->session->set_flashdata('error',(validation_errors()));
			redirect('Profile');
		}
	}

}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */