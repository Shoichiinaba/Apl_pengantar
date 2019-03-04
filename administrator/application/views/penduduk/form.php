
	<!-- Load File jquery.min.js yang ada difolder js -->
	<script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
	
	<script>
	$(document).ready(function(){
		// Sembunyikan alert validasi kosong
		$("#kosong").hide();
	});
	</script>
</head>

<body>

<div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Input Data Penduduk
          <small>Example 1.0 (beta)</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo site_url(''); ?>"><i class="fa fa-dashboard"></i> Home > Input data penduduk</a></li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="row">
        <div class="col-xs-12">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Form Import <b> Data Excel<b></h3>
            </div>
            <div class="box-body">
              
            	<td><a href="<?php echo base_url("excel/format.xlsx"); ?>">
                    <button type="button" class="btn btn.bg-maroon">Download Format</button>
                  </td></a>
		<br>
		<br>
		<div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Pilih File</h3>
            </div>
            <form method="post" action="<?php echo base_url("index.php/Siswa/form"); ?>" enctype="multipart/form-data">

            <div class="box-body">
              <div class="row">
                <div class="col-xs-3">
                  <input type="file" name="file">
                </div>
                <div class="col-xs-4">
                  <button type="submit"  name="preview" class="btn btn-info">Preview</button>
				</div>
                </div>
                
                 </div>
            </form>

	 <div class="box-body">
                            <div class="table-responsive">
	<?php
	if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form 
		if(isset($upload_error)){ // Jika proses upload gagal
			echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
			die; // stop skrip
		}
		
		// Buat sebuah tag form untuk proses import data ke database
		echo "<form method='post' action='".base_url("index.php/Siswa/import")."'>";
		
		// Buat sebuah div untuk alert validasi kosong
		echo "<div style='color: red;' id='kosong'>
		Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
		</div>";
		
		echo "<table border='1' cellpadding='8'>
		<tr>
		<div class='panel-body'>
                            <div class='table-responsive'>
                                <table class='table table-striped table-bordered table-hover' id='dataTables-example'>
		<th colspan='13'>Preview Data</th>
		</tr>
		<tr>
			<th>NIK</th>
        	<th>Nama Penduduk</th>
        	<th>Jenis Kelamin</th>
        	<th>Tempat Lahir</th>
        	<th>Tanggal Lahir</th>
        	<th>Kewarganegaraan</th>
        	<th>agama</th>
        	<th>Status</th>
        	<th>Pend. Terakhir</th>
        	<th>Pekerjaan</th>
        	<th>Alamat</th>
        	<th>RT</th>
        	<th>RW</th>
			</tr>
			</div>
			</div>";
		
		$numrow = 1;
		$kosong = 0;
		
		// Lakukan perulangan dari data yang ada di excel
		// $sheet adalah variabel yang dikirim dari controller
		foreach($sheet as $row){ 
			// Ambil data pada excel sesuai Kolom
			$NIK = $row['A']; // Ambil data NIS
			$nama = $row['B']; // Ambil data nama
			$jenis_kel = $row['C']; // Ambil data jenis kelamin
			$tempat_lahir = $row['D']; // Ambil data alamat
			$tgl_lahir = $row['E']; // Ambil data NIS
			$kewarganegaraan = $row['F']; 
			$agama = $row['G'];// Ambil data nama
			$status = $row['H']; // Ambil data jenis kelamin
			$pendidikan_ter = $row['I'];
			$pekerjaan = $row['J']; // Ambil data jenis kelamin
			$alamat = $row['K']; // Ambil data alamat
			$RT = $row['L']; // Ambil data NIS
			$RW = $row['M']; // Ambil data nama
			
			
			// Cek jika semua data tidak diisi
			if(empty($NIK) && empty($nama) && empty($jenis_kel) && empty($tempat_lahir) && empty($tgl_lahir) && empty($kewarganegaraan) && empty($agama) && empty($status) && empty($pendidikan_ter) && empty($pekerjaan) && empty($alamat) && empty($RT) && empty($RW))
				continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
			
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Validasi apakah semua data telah diisi
				$NIK_td = ( ! empty($NIK))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
				$nama_td = ( ! empty($nama))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
				$jenis_kel_td = ( ! empty($jenis_kel))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
				$tempat_lahir_td = ( ! empty($tempat_lahir))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
				$tgl_lahir_td = ( ! empty($tgl_lahir))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
				$kewarganegaraan_td = ( ! empty($kewarganegaraan))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
				$agama_td = ( ! empty($agama))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
				$status_td = ( ! empty($status))? "" : " style='background: #E07171;'";

				$pendidikan_ter_td = ( ! empty($pendidikan_ter))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
				$pekerjaan_td = ( ! empty($pekerjaan))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
				$alamat_td = ( ! empty($alamat))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
				$RT_td = ( ! empty($RT))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
				$RW_td = ( ! empty($RW))? "" : " style='background: #E07171;'";
				
				// Jika salah satu data ada yang kosong
				if(empty($NIK) or empty($nama) or empty($jenis_kel) or empty($tempat_lahir) or empty($tgl_lahir) or empty($kewarganegaraan) or empty($agama) or empty($status) or empty($pendidikan_ter) or empty($pekerjaan) or empty($alamat) or empty($RT) or empty($RW) ){
					$kosong++; // Tambah 1 variabel $kosong
				}
				
				echo "<tr>";
				echo "<td".$NIK_td.">".$NIK."</td>";
				echo "<td".$nama_td.">".$nama."</td>";
				echo "<td".$jenis_kel_td.">".$jenis_kel."</td>";
				echo "<td".$tempat_lahir_td.">".$tempat_lahir."</td>";
				echo "<td".$tgl_lahir_td.">".$tgl_lahir."</td>";
				echo "<td".$kewarganegaraan_td.">".$kewarganegaraan."</td>";
				echo "<td".$agama_td.">".$agama."</td>";
				echo "<td".$status_td.">".$status."</td>";
				echo "<td".$pendidikan_ter_td.">".$pendidikan_ter."</td>";
				echo "<td".$pekerjaan_td.">".$pekerjaan."</td>";
				echo "<td".$alamat_td.">".$alamat."</td>";
				echo "<td".$RT_td.">".$RT."</td>";
				echo "<td".$RW_td.">".$RW."</td>";
				echo "</tr>";
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}
		
		echo "</table>";
		
		// Cek apakah variabel kosong lebih dari 0
		// Jika lebih dari 0, berarti ada data yang masih kosong
		if($kosong > 0){
		?>	
			<script>
			$(document).ready(function(){
				// Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
				$("#jumlah_kosong").html('<?php echo $kosong; ?>');
				
				$("#kosong").show(); // Munculkan alert validasi kosong
			});
			</script>
		<?php
		}else{ // Jika semua data sudah diisi
			echo "<hr>";
			
			// Buat sebuah tombol untuk mengimport data ke database
			echo "<button type='submit' name='import' class='btn btn-info'>Import</button>";

			echo "<a href='".base_url("index.php/Siswa")."'>Cancel</a>";
		}
		
		echo "</form>";
	}
	?>
</div>
</div>

             </td>
         </div>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</div>

