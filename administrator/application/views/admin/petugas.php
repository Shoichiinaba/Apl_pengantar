<div class="content-wrapper">

<section class="content-header">
      <h1>
        Daftar
        <small>Data Petugas</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url(''); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Petugas</a></li>
        <li class="active">Data Petugas.</li>
      </ol>
    </section>

        <?php if ($this->session->flashdata('sukses')):?>
                  <script>
                    swal({
                      title: 'Data Petugas!!',
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
                            <h3 class="box-title">List Data Petugas</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped" >
                                    <thead>
                                        <tr>
                                            <th width ='12%'>ID Petugas</th>
                                            <th>Nama</th>
                                            <th width ='13%'>Alamat</th>
                                            <th>RT</th>
                                            <th>RW</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Jabatan</th>
                                            <th width ='10%'>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php $no=  0; foreach($list as $pet ): $no++;?>
                                    <tr>
                                        <td><?php echo $pet->id_petugas; ?></td>
                                        <td><?php echo $pet->nama; ?></td>
                                        <td><?php echo $pet->alamat; ?></td>
                                        <td><?php echo $pet->rt; ?></td>
                                        <td><?php echo $pet->rw; ?></td>
                                        <td><?php echo $pet->no_tel; ?></td>
                                        <td><?php echo $pet->email; ?></td>
                                        <td><?php echo $pet->jabatan; ?></td>
                                        <td align="center">

                                            <a data-toggle="modal" data-target="#modal-edit<?=$pet->id_petugas;?>" class="btn btn-danger btn-xs" data-popup="tooltip" data-original-title="Edit Data" data-placement="top" ><i class="fa fa-check-square-o"></i></a>

                                            <a href="<?php echo site_url('petugas_c/hapus/'.$pet->id_petugas); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');" class="btn btn-danger btn-xs tooltips" data-popup="tooltip" data-original-title="Hapus Data" data-placement="top"><i class="glyphicon glyphicon-trash"></i></a>

                                    </tr>
                                     <?php endforeach;?>
                                </tbody>
                             </table>
                                <div class="box-body">
                                      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-medkit"></i>
                                            Tambah Petugas
                                      </button>
                                <a href="<?php echo base_url()?>index.php/user_c/">
                                <button type="submit" class="btn btn-info">
                                <i class="fa fa-random"></i>&nbsp; List Data User
                                </button>
            </a>
                            </div>
                              </div>
            </div>
    </div>
         </div>   
         </section>

         <div class="modal fade" id="modal-tambah">
          <div class="modal-dialog">
            <form action="<?php echo site_url('petugas_c/simpan'); ?>" method="post">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Petugas</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
            <label class='col-md-3'>ID Petugas</label>
            <div class='col-md-9'>
            <input type="text" readonly="" value="<?= $nomer; ?>" name="id_petugas" class="form-control" required="" ></div>
          </div>
          <br>
          <div class="form-group">
            <label class='col-md-3'>Nama Lengkap</label>
            <div class='col-md-9'><input type="text" name="nama"  autocomplete="off" class="form-control"
              required="" ></div>
          </div>
          <br>
          <div class="form-group">
            <label class='col-md-3'>Alamat</label>
            <div class='col-md-9'><input type="text" name="alamat"  autocomplete="off" class="form-control"
              required="" ></div>
          </div>
          <br>
          <div class="form-group">
              <label class="control-label col-md-3">RT</label>
              <div class="col-md-9">
              <select name="rt" class="form-control">
                    <option value="">Pilih RT</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
              </select>
              </div>
              </div>
          <br>
          <div class="form-group">
              <label class="control-label col-md-3">RW</label>
              <div class="col-md-9">
              <select name="rw" class="form-control">
                    <option value="">Pilih RW</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
              </select>
              </div>
              </div>
          <br>
          <div class="form-group">
            <label class='col-md-3'>Phone</label>
            <div class='col-md-9'><input type="text" name="no_tel" autocomplete="off" class="form-control"
              required="" ></div>
          </div>
          <br>
          <div class="form-group">
            <label class='col-md-3'>Email</label>
            <div class='col-md-9'><input type="text" name="email"  autocomplete="off" class="form-control"
              required="" ></div>
          </div>
          <br>
          <div class="form-group">
              <label class="control-label col-md-3">Jabatan</label>
              <div class="col-md-9">
              <select name="jabatan" class="form-control">
                    <option value="">Pilih Jabatan</option>
                    <option value="Ketua RT">Ketua RT</option>
                    <option value="Ketua RW">Ketua RW</option>
                    <option value="IT Kelurahan">IT Kelurahan</option>
              </select>
              </div>
              </div>
          <br>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Simpan</button>
              </div>
            </div>
          </form>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

      <?php $no=  0; foreach($list as $pet ): $no++;?>
        <div class="modal fade" id="modal-edit<?=$pet->id_petugas;?>">
          <div class="modal-dialog">
            <form action="<?php echo site_url('petugas_c/edit'); ?>" method="post">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Petugas</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
            <label class='col-md-3'>ID Petugas</label>
            <div class='col-md-9'>
            <input type="text" readonly="" value="<?=$pet->id_petugas;?>" name="id_petugas" class="form-control" required="" ></div>
          </div>
          <br>
          <div class="form-group">
            <label class='col-md-3'>Nama Lengkap</label>
            <div class='col-md-9'><input type="text" value="<?=$pet->nama;?>" name="nama"  autocomplete="off" class="form-control"
              required="" ></div>
          </div>
          <br>
          <div class="form-group">
            <label class='col-md-3'>Alamat</label>
            <div class='col-md-9'><input type="text" value="<?=$pet->alamat;?>" name="alamat"  autocomplete="off" class="form-control"
              required="" ></div>
          </div>
          <br>
          <div class="form-group">
              <label class="control-label col-md-3">RT</label>
              <div class="col-md-9">
              <select name="rt" class="form-control">
                    <option value="<?=$pet->rt;?>"><?=$pet->rt;?></option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
              </select>
              </div>
              </div>
          <br>
          <div class="form-group">
              <label class="control-label col-md-3">RW</label>
              <div class="col-md-9">
              <select name="rw" class="form-control">
                    <option value="<?=$pet->rw;?>"><?=$pet->rw;?></option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
              </select>
              </div>
              </div>
          <br>
          <div class="form-group">
            <label class='col-md-3'>Phone</label>
            <div class='col-md-9'><input type="text" value="<?=$pet->no_tel;?>" name="no_tel" autocomplete="off" class="form-control"
              required="" ></div>
          </div>
          <br>
          <div class="form-group">
            <label class='col-md-3'>Email</label>
            <div class='col-md-9'><input type="text" value="<?=$pet->email;?>" name="email"  autocomplete="off" class="form-control"
              required="" ></div>
          </div>
          <br>
          <div class="form-group">
              <label class="control-label col-md-3">Jabatan</label>
              <div class="col-md-9">
              <select name="jabatan" class="form-control">
                    <option value="<?=$pet->jabatan;?>"><?=$pet->jabatan;?></option>
                    <option value="Ketua RT">Ketua RT</option>
                    <option value="Ketua RW">Ketua RW</option>
                    <option value="IT Kelurahan">IT Kelurahan</option>
              </select>
              </div>
              </div>
          <br>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Simpan</button>
              </div>
            </div>
          </form>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <?php endforeach;?>
</div>
