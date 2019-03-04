<div class="content-wrapper">
  <div class="container">
        <div><?php if ($this->session->flashdata('sukses')):?>
          <script>
            swal({
              title: 'Permohonan Pengantar!!',
              text: "<?php echo $this->session->flashdata('sukses');?>",
              type: 'success'
            });
          </script>
        <?php endif; ?>
      </div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        HOME
        <small>Example 1.0 (beta)</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('pengantar_c/'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="callout callout-danger">
        <div class="callout callout-danger" style="margin-bottom: 0!important;">
        <center><h4><i class="fa fa-institution"></i> Selamat Datang Di Aplikasi Surat Pengantar RT/RW Online:  <i class="fa fa-institution"></i></h4></center>
        <p>Aplikasi ini dibuat untuk menjawab keluh kesah masyarakat dalam mengurus surat pengantar di RT maupun RW terkadan Ketua RT yang sibuk Susah untuk dicari,
            sehingga saat akan mengurus surat pengantar jerjadi kendala.</p>
      </div>
      <br>

    </div>

      <div class="row">
        <div class="col-xs-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Menu <b>Transaksi<b></h3>
            </div>
            <div class="box-body">
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-tambah">
                Buat Pengantar
              </button>
               <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-search">
                Lihat Status Pengantar
              </button>
            </div>
          </div>
        </div>
      </div>

        <div class="modal fade" id="modal-tambah">
          <div class="modal-dialog">
            <form action="<?php echo site_url('pengantar_c/simpan'); ?>" method="post">
            <div class="modal-content">
              <div class="modal-header bg-danger">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Isikan Keperluan Anda</h4>
              </div>

              <div class="modal-body">
                

                <div class="form-group">
            <label class='col-md-3'>No Pengantar</label>
            <div class='col-md-9'><input type="text" name="no_pengantar" value="<?= $nomer; ?>" class="form-control" readonly=""></div>
          </div>

          <div class="form-group">
            <label class='col-md-3'>NIK</label>
            <div class='col-md-9'>
            <input type="text" id="NIK" name="NIK" placeholder="Masukan NIK Anda" class="form-control" required="" ></div>
          </div>
          <br>

          <div class="form-group">
            <label class='col-md-3'>Nama Lengkap</label>
            <div class='col-md-9'><input type="text" name="nama" autocomplete="off" placeholder="Nama Otomatis" class="form-control" readonly="" 
              required="" ></div>
          </div>
          <br>

          <div class="form-group">
            <label class='col-md-3'>Keperluan</label>
            <div class='col-md-9'><input type="text" name="keperluan" autocomplete="off" placeholder="Masukkan keperluan" class="form-control" required="" ></div>
          </div>
          <br>
          
           <div class="form-group">
            <label class='col-md-3'>Lain lain</label>
            <div class='col-md-9'><textarea type="text" name="lain_lain" autocomplete="off" required placeholder="Lain Lain" class="form-control" required=""></textarea></div>
          </div>
      </br><br><br>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Buat</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </form>
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
  <script type="text/javascript">
    $(document).ready(function(){
       $('#NIK').on('input',function(){
                
                var NIK=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('index.php/welcome/get_nik')?>",
                    dataType : "JSON",
                    data : {NIK: NIK},
                    cache:false,
                    success: function(data){
                        $.each(data,function(NIK, nama){
                            $('[name="nama"]').val(data.nama);
                            
                            
                        });
                        
                    }
                });
                return false;
           });

    });
  </script>

        <div class="modal modal-danger fade" id="modal-search">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cari Status Pengantar</h4>
              </div>
              <div class="modal-body">
                <form id="form_search" action="<?php echo site_url('welcome/search');?>" method="GET">
                
                  <div class="form-group">
                 <div class="input-group input-group-xs">
                <input type="text" class="form-control" name="NIK" placeholder="Masukan NIK atau No Pengantar">
               
                <span class="input-group-btn">
                      <button type="submit" name="submit" class="btn btn-info btn-flat">Cari!</button>
                    </span>
              </div>
            </div>

                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Keluar</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
            <script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
            <script type="text/javascript">
                  $(document).ready(function(){

                      $('#NIK').autocomplete({
                            source: "<?php echo site_url('pengantar_c/get_autocomplete');?>",
     
                            select: function (event, ui) {
                                $(this).val(ui.item.label);
                                 $("#form_search").submit(); 
                      }
                  });

              });
              </script>

    </section>
  </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->