<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
		function __construct() {
		parent::__construct();
		$this->load->model('validasi_m');
		}
		function index()
	{
    
	}		

    function laprec($no)
    {
     

        $data = $this->validasi_m->get_cetak($no);
        
        if($data != 'NO_DATA_QUERY'){
            $NIK = $data[0]['NIK'];
            $no_pengantar = $data[0]['no_pengantar'];
            $tanggal_berlaku = $data[0]['tanggal_berlaku'];
            $tgl_pengantar = $data[0]['tgl_pengantar'];
            $keperluan = $data[0]['keperluan'];
            $lain_lain = $data[0]['lain_lain'];
            
            $nama = $data[0]['nama'];
            $jenis_kel = $data[0]['jenis_kel'];
            $tempat_lahir = $data[0]['tempat_lahir'];
            $tgl_lahir = $data[0]['tgl_lahir'];
            $kewarganegaraan = $data[0]['kewarganegaraan'];
            $agama = $data[0]['agama'];
            $status = $data[0]['status'];
            $pendidikan_ter = $data[0]['pendidikan_ter'];
            $pekerjaan = $data[0]['pekerjaan'];
            $alamat = $data[0]['alamat'];
            $this->load->library('pdf');
        $pdf = new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',12);

        //Kop Surat
        $pdf->Cell(25);
        $pdf->Image(base_url(). "assets/img/semarang_log1.jpg",18,2,'C');
        $pdf->Ln(0);
        $pdf->Cell(0,0,'PEMERINTAH KOTA SEMARANG ',0,0,'C');
        $pdf->Ln(5);
        $pdf->Cell(0,0,'KECAMATAN SEMARANG BARAT ',0,0,'C');
        $pdf->Ln(5);
        $pdf->Cell(0,0,'KELURAHAN KRAPYAK ',0,0,'C');
        $pdf->Ln();
        $pdf->SetFont('Arial','i',9);
        $pdf->Cell(106,12,'Alamat: Jl. Subali Raya',0,0,'C');
        $pdf->Cell(15,12,'Tlp: (024) 7617910',0,0,'R');
        $pdf->Cell(50,12,'Code Pos: 50146',0,0,'R');
        $pdf->Ln(0);
        $pdf->setlinewidth(0.6);
        $pdf->Cell(0, 9, " ", "B");
        $pdf->setlinewidth(0.3);
        $pdf->Ln(0.7);
        $pdf->Cell(0, 9, " ", "B");
        $pdf->Ln(4);

        // konten lampiran
        $pdf->SetFont('Arial','',10);
        $pdf->Ln();
        $pdf->Cell(35, 4, 'No Pengantar', 0, 0, 'L'); 
        $pdf->Cell(85, 4,':'.$no_pengantar, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Lampiran', 0, 0, 'L'); 
        $pdf->Cell(85, 4,':      --', 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Hal', 0, 0, 'L');
        $pdf->Cell(35, 4,':Surat Pengantar', 0, 0, 'L');
        $pdf->Ln(9);


        //konten isi:
        $pdf->Ln(6);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(35, 4, 'Yang bertandatangan di bawah ini menerangkan bahwa :', 0, 0, 'L');
        $pdf->Ln(9);
        $pdf->Cell(35, 4, 'NIK', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$NIK, 0, 0, 'L');
        $pdf->Ln(5); 
        $pdf->Cell(35, 4, 'Nama Lengkap', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$nama, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Jenis Kelamin', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$jenis_kel, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Tempat Lahir', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$tempat_lahir, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Tanggal Lahir', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$tgl_lahir, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Status', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$status, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Agama', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$agama, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Kewarganegaraan', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$kewarganegaraan, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Alamat', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$alamat, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Pendidikan. Ter', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$pendidikan_ter, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Pekerjaan', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$pekerjaan, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Tanggal Berlaku', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$tanggal_berlaku, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Keperluan', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$keperluan, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Lain Lain', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$lain_lain, 0, 0, 'L');
        $pdf->Ln(9);

        $pdf->Cell(35, 4, 'Demikian untuk menjadikan maklum bagi yang berkepentingan.', 0, 0, 'L');
        $pdf->Ln(20);
        $pdf->Cell(35, 4, 'Mengetahui,', 0, 0, 'L');
        $pdf->Cell(151, 4, 'Semarang,'.date(" d F Y"), 0, 0, 'R');
        $pdf->Ln(6);
        $pdf->Cell(43, 4, 'Tanda Tangan Pemegang', 0, 0, 'C');
        $pdf->Cell(60, 4, 'Camat Semarang Barat', 0, 0, 'R');
        $pdf->Cell(62, 4, 'Lurah Krapyak', 0, 0, 'R');
        $pdf->Ln(25);
        $pdf->Cell(29, 4,''.$nama, 0, 0, 'C');
        $pdf->Cell(60, 4,'SUMARJO, SH', 0, 0, 'R');
        $pdf->Cell(93, 4,'TITIK SUHARNI, SH, MS.i', 0, 0, 'R');
        $pdf->setlinewidth(0.3);
        $pdf->Line(11,197,60,197);
        $pdf->Line(74,197,135,197);
        $pdf->Line(199,197,150,197);
        $pdf->Ln(6);
        $pdf->Cell(71, 4, 'NIP', 0, 0, 'R');
        $pdf->Cell(42, 4,': 19610402 199603 1 001', 0, 0, 'R');
        $pdf->Cell(34, 4, 'NIP', 0, 0, 'R');
        $pdf->Cell(50, 4,': 19690225 199703 2 004', 0, 0, 'L');
        
        $pdf->Output();
        
        }
    }

    function cetak($no)
    {
        $data = $this->validasi_m->get_cetak($no);

        if($data != 'NO_DATA_QUERY'){
            $NIK = $data[0]['NIK'];
            $no_pengantar = $data[0]['no_pengantar'];
            $tanggal_berlaku = $data[0]['tanggal_berlaku'];
            $tgl_pengantar = $data[0]['tgl_pengantar'];
            $keperluan = $data[0]['keperluan'];
            $lain_lain = $data[0]['lain_lain'];
            $nama = $data[0]['nama'];
            $jenis_kel = $data[0]['jenis_kel'];
            $tempat_lahir = $data[0]['tempat_lahir'];
            $tgl_lahir = $data[0]['tgl_lahir'];
            $kewarganegaraan = $data[0]['kewarganegaraan'];
            $agama = $data[0]['agama'];
            $status = $data[0]['status'];
            $pendidikan_ter = $data[0]['pendidikan_ter'];
            $pekerjaan = $data[0]['pekerjaan'];
            $alamat = $data[0]['alamat'];
            $RT = $data[0]['RT'];
            $RW = $data[0]['RW'];
            $this->load->library('pdf');
        $pdf = new FPDF('P','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',12);

        //Kop Surat
        $pdf->Cell(25);
        $pdf->Image(base_url(). "assets/img/semarang_log1.jpg",18,2,'C');
        $pdf->Ln(0);
        $pdf->Cell(0,0,'PEMERINTAH KOTA SEMARANG ',0,0,'C');
        $pdf->Ln(5);
        $pdf->Cell(0,0,'KECAMATAN SEMARANG BARAT ',0,0,'C');
        $pdf->Ln(5);
        $pdf->Cell(0,0,'KELURAHAN KRAPYAK ',0,0,'C');
        $pdf->Ln(5);
        $pdf->Cell(78,0,'RT ',0,0,'R');
        $pdf->Cell(5, 0,': '.$RT, 0, 0, 'R');
        $pdf->Cell(32,0,'RW ',0,0,'R');
        $pdf->Cell(5, 0,': '.$RW, 0, 0, 'R');
        $pdf->Ln();
        $pdf->setlinewidth(0.6);
        $pdf->Cell(0, 9, " ", "B");
        $pdf->setlinewidth(0.3);
        $pdf->Ln(0.7);
        $pdf->Cell(0, 9, " ", "B");
        $pdf->Ln(4);

        // konten lampiran
        $pdf->SetFont('Arial','',10);
        $pdf->Ln();
        $pdf->Cell(35, 4, 'No Pengantar', 0, 0, 'L'); 
        $pdf->Cell(85, 4,':'.$no_pengantar, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Lampiran', 0, 0, 'L'); 
        $pdf->Cell(85, 4,':      --', 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Hal', 0, 0, 'L');
        $pdf->Cell(35, 4,':Surat Pengantar', 0, 0, 'L');
        $pdf->Ln(9);


        //konten isi:
        $pdf->Ln(6);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(35, 4, 'Yang bertandatangan di bawah ini menerangkan bahwa :', 0, 0, 'L');
        $pdf->Ln(9);
        $pdf->Cell(35, 4, 'NIK', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$NIK, 0, 0, 'L');
        $pdf->Ln(5); 
        $pdf->Cell(35, 4, 'Nama Lengkap', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$nama, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Tempat/Tanggal Lahir', 0, 0, 'L');
        $pdf->Cell(21, 4,' : '.$tempat_lahir, 0, 0, 'R');
        $pdf->Cell(22, 4,'  / '.$tgl_lahir, 0, 0, 'R');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Status', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$status, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Agama', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$agama, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Kewarganegaraan', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$kewarganegaraan, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Alamat', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$alamat, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Pendidikan. Ter', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$pendidikan_ter, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Pekerjaan', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$pekerjaan, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Tanggal Berlaku', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$tanggal_berlaku, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Keperluan', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$keperluan, 0, 0, 'L');
        $pdf->Ln(5);
        $pdf->Cell(35, 4, 'Lain Lain', 0, 0, 'L');
        $pdf->Cell(85, 4,'  : '.$lain_lain, 0, 0, 'L');
        $pdf->Ln(9);

        $pdf->Cell(35, 4, 'Demikian untuk menjadikan maklum dan guna seperlunya.', 0, 0, 'L');
        $pdf->Ln(20);
        $pdf->Cell(35, 4, 'Mengetahui,', 0, 0, 'L');
        $pdf->Cell(151, 4, 'Semarang,'.date(" d F Y"), 0, 0, 'R');
        $pdf->Ln(6);
        $pdf->Cell(18, 4, 'Ketua RW', 0, 0, 'C');
        $pdf->Cell(8, 4,': '.$RW, 0, 0, 'C');
        $pdf->Cell(33, 4, 'Kelurahan Krapyak', 0, 0, 'R');
        $pdf->Cell(97, 4, 'Ketua RT', 0, 0, 'R');
        $pdf->Cell(6, 4, ': '.$RT, 0, 0, 'R');
        $pdf->Cell(12, 4, '/ RW', 0, 0, 'R');
        $pdf->Cell(6, 4,': '.$RW, 0, 0, 'R');
        $pdf->Ln(25);
        $pdf->Cell(54, 4,'(..........................................)', 0, 0, 'C');
        $pdf->Cell(131, 4,'(..........................................)', 0, 0, 'R');
        
        $pdf->Output();
        
        }
    }


}

