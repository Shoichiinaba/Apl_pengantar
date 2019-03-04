<div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          HOME
          <small>Example 1.0 (beta)</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo site_url('admin/'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="callout callout-danger">
      	<div class="callout callout-danger" style="margin-bottom: 0!important;">
        <center><h4><i class="fa fa-institution"></i> Selamat Datang Di Halaman Administrator Aplikasi Surat Pengantar RT RW berbasis WEB:  <i class="fa fa-institution"></i></h4></center>
        <p>Halaman Admin ini Berfungsi Untuk Validasi, Input data Penduduk, Cetak Pengantar dan pengontrolan Surat Pengantar Yang Masuk.</p>
      	</div>
      </div>

      <div class="row">
  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?php echo $jml_penduduk; ?></h3> 

        <p>Jumlah Penduduk</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-contact"></i>
      </div>
      <a href="<?php echo base_url('admin/tampil') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-green">
      <div class="inner">
         <h3><?php echo $jml_pengantar; ?></h3> 
        <p>Jumlah Permohonan Pengantar</p>
      </div>
      <div class="icon">
        <i class="ion ion-clipboard"></i>
      </div>
      <a href="<?php echo base_url('') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-yellow">
      <div class="inner">
         <h3><?php echo $jml_pegawai; ?></h3> 

        <p>Jumlah Admin</p>
      </div>
      <div class="icon">
        <i class="on ion-person-add"></i>
      </div>
      <a href="<?php echo base_url('Profile') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
      </section>
    </div>

</div>
