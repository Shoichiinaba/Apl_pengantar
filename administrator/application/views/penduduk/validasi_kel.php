
<div class="content-wrapper">
  <section class="content-header">
      <h1>
        Validasi
        <small>Data Permohonan Pengantar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(''); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Validasi</a></li>
        <li class="active">Data Permohonan Peng.</li>
      </ol>
    </section>

<?php if ($this->session->flashdata('sukses')):?>
          <script>
            swal({
              title: 'Permohonan Pengantar !!',
              text: "<?php echo $this->session->flashdata('sukses');?>",
              type: 'success'
            });
          </script>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')):?>
          <script>
            swal({
              title: 'Oops!!',
              text: "<?php echo $this->session->flashdata('error');?>",
              type: 'error'
            });
          </script>
        <?php endif; ?>
    <section class="content">
      <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">List Data Pengajuan Pengantar</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width ='12%'>No Pengantar</th>
                                            <th>NIK</th>
                                            <th width ='13%'>Nama Penduduk</th>
                                            <th width ='13%'>Tanggal Berlaku</th>
                                            <th width ='15%'>Tanggal Pengantar</th>
                                            <th>Keperluan</th>
                                            <th>Lain Lain</th>
                                            <th width ='10%'>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php $no=  0; foreach($pengantar as $val ): $no++;?>
                                    <tr>
                                        <td><?php echo $val->no_pengantar; ?></td>
                                        <td><?php echo $val->NIK; ?></td>
                                        <td><?php echo $val->nama; ?></td>
                                        <td><?php echo $val->tanggal_berlaku; ?></td>
                                        <td><?php echo $val->tgl_pengantar; ?></td>
                                        <td><?php echo $val->keperluan; ?></td>
                                        <td><?php echo $val->lain_lain; ?></td>
                                        <td align="center">

                                            <a data-toggle="modal" data-target="#modal-show<?=$val->NIK;?>" class="btn btn-success btn-xs"  data-placement="top"  title="Detail"><i class="fa fa-tripadvisor"></i></a>

                                            <a target="_blank" href="<?php echo base_url('/laporan/laprec/'.$val->no_pengantar); ?>"class="btn btn-success btn-xs" >
                                            <i class="glyphicon glyphicon-print" class="btn btn-success btn-xs tooltips" data-toggle="tooltip"data-placement="bottom" title="Print"></i></a>

                                            <a href="<?php echo site_url('admin/hapus_kel/'.$val->no_pengantar); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');" class="btn btn-success btn-xs tooltips" data-tonggle="tooltip" data-placement="bottom"><i class="glyphicon glyphicon-trash" title="Hapus"></i></a>

                                    </tr>
                                     <?php endforeach;?>
                                </tbody>
                             </table>
                                </div>
                </div>
            </div>
    </div>
         </div>   
         </section>
         </div> 

<?php $no=0; foreach($detail as $peng): $no++; ?>
   <div id="modal-show<?=$peng->NIK;?>" class="modal fade">
    <div class="modal-dialog">
      <form>
      <div class="modal-content">
        <div class="modal-header bg-info">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Detail Penduduk</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label class='col-md-3'>NIK</label>
            <div class='col-md-9'>
            <input type="text" readonly="" value="<?=$peng->NIK;?>" name="NIK" class="form-control" required="" ></div>
          </div>
          <br>
          <div class="form-group">
            <label class='col-md-3'>Nama Lengkap</label>
            <div class='col-md-9'><input type="text" readonly="" value="<?=$peng->nama;?>" autocomplete="off" class="form-control"
              required="" ></div>
          </div>
          <br>
          <div class="form-group">
            <label class='col-md-3'>Jenis Kelamin</label>
            <div class='col-md-9'><input type="text" readonly="" value="<?=$peng->jenis_kel;?>" autocomplete="off" class="form-control"
              required="" ></div>
          </div>
          <br>
          <div class="form-group">
            <label class='col-md-3'>Tempat Lahir</label>
            <div class='col-md-9'><input type="text" readonly="" value="<?=$peng->tempat_lahir;?>"autocomplete="off" class="form-control"
              required="" ></div>
          </div>
          <br>
          <div class="form-group">
            <label class='col-md-3'>Tanggal Lahir</label>
            <div class='col-md-9'><input type="text" readonly="" value="<?=$peng->tgl_lahir;?>" autocomplete="off" class="form-control"
              required="" ></div>
          </div>
          <br>
          <div class="form-group">
            <label class='col-md-3'>Kewarganegaraan</label>
            <div class='col-md-9'><input type="text" readonly="" value="<?=$peng->kewarganegaraan;?>"autocomplete="off" class="form-control"
              required="" ></div>
          </div>
          <br>
          <div class="form-group">
            <label class='col-md-3'>Agama</label>
            <div class='col-md-9'><input type="text" readonly="" value="<?=$peng->agama;?>" autocomplete="off" class="form-control"
              required="" ></div>
          </div>
          <br>
          <div class="form-group">
            <label class='col-md-3'>Status</label>
            <div class='col-md-9'><input type="text" readonly="" value="<?=$peng->status;?>" autocomplete="off" class="form-control"
              required="" ></div>
          </div>
          <br>
          <div class="form-group">
            <label class='col-md-3'>Pend. Terakhir</label>
            <div class='col-md-9'><input type="text" readonly="" value="<?=$peng->pendidikan_ter;?>"autocomplete="off" class="form-control"
              required="" ></div>
          </div>
          <br>
           <div class="form-group">
            <label class='col-md-3'>Alamat</label>
            <div class='col-md-9'><input type="text" readonly="" value="<?=$peng->alamat;?>"autocomplete="off" class="form-control"
              required="" ></div>
          </div>
          <br>
          <div class="form-group">
            <label class='col-md-3'>Pekerjaan</label>
            <div class='col-md-9'><input type="text" readonly="" value="<?=$peng->pekerjaan;?>"autocomplete="off" class="form-control"
              required="" ></div>
          </div>
          <br>
          <div class="form-group">
            <label class='col-md-3'>RT</label>
            <div class='col-md-9'><input type="text" readonly="" value="<?=$peng->RT;?>"autocomplete="off" class="form-control"
              required="" ></div>
          </div>
          <br>
          <div class="form-group">
            <label class='col-md-3'>RW</label>
            <div class='col-md-9'><input type="text" readonly="" value="<?=$peng->RW;?>"autocomplete="off" class="form-control"
              required="" ></div>
          </div>
          <br>
      </br><br><br>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
          </div>
    </div>
</form>
</div>
</div>
  </div>
<?php endforeach;?>
