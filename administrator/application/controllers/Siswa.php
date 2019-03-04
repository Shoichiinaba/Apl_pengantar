<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Siswa extends AUTH_Controller {
	private $filename = "import_data"; // Kita tentukan nama filenya
	var $template='template/index';

	public function __construct(){
		parent::__construct();
		
		$this->load->model('SiswaModel');
	}
	
	public function index(){
		$data['content'] = 'penduduk/form';
		$data['siswa'] = $this->SiswaModel->view();
		$data['userdata'] 	= $this->userdata;
        $this->load->view($this->template, $data);
    }
	
	public function form(){
		$data = array(); // Buat variabel $data sebagai array
		
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
			$upload = $this->SiswaModel->upload_file($this->filename);
			
			if($upload['result'] == "success"){ // Jika proses upload sukses
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';
				
				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
				
				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
				$data['sheet'] = $sheet; 
			}else{ // Jika proses upload gagal
				$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}
		
		$data['userdata'] = $this->userdata;
		$data['content']  = 'penduduk/form';
		 $this->load->view($this->template, $data);
	}
	
	public function import(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = array();
		
		$numrow = 1;
		foreach($sheet as $row){
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Kita push (add) array data ke variabel data
				array_push($data, array(
					'NIK'=>$row['A'], // Insert data nis dari kolom A di excel
					'nama'=>$row['B'], // Insert data nama dari kolom B di excel
					'jenis_kel'=>$row['C'], // Insert data jenis kelamin dari kolom C di excel
					'tempat_lahir'=>$row['D'],
					'tgl_lahir'=>$row['E'],
					'kewarganegaraan'=>$row['F'],
					'agama'=>$row['G'],
					'status'=>$row['H'],
					'pendidikan_ter'=>$row['I'],
					'pekerjaan'=>$row['J'],
					'alamat'=>$row['K'],
					'RT'=>$row['L'],
					'RW'=>$row['M'],// Insert data alamat dari kolom D di excel
				));
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->SiswaModel->insert_multiple($data);
		 $this->session->set_flashdata('sukses',"Berhasil Di Import");
		redirect('admin/tampil'); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}
}
