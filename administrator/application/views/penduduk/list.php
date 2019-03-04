<div class="content-wrapper">
    <section class="content">

      <?php if ($this->session->flashdata('sukses')):?>
          <script>
            swal({
              title: 'Data Penduduk!!',
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

      <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">List Data Penduduk</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped" >
                                    <thead>
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
                                            <th width ='6%'>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                       <?php $no=  0; foreach($data as $o ): $no++;?>
                                  <tr>
                                    <td><?php echo $o->NIK; ?></td>
                                    <td><?php echo $o->nama; ?></td>
                                    <td><?php echo $o->jenis_kel ; ?></td>
                                    <td><?php echo $o->tempat_lahir; ?></td>
                                    <td><?php echo $o->tgl_lahir; ?></td>
                                    <td><?php echo $o->kewarganegaraan; ?></td>
                                    <td><?php echo $o->agama; ?></td>
                                    <td><?php echo $o->status; ?></td>
                                    <td><?php echo $o->pendidikan_ter; ?></td>
                                    <td><?php echo $o->pekerjaan; ?></td>
                                    <td><?php echo $o->alamat; ?></td>
                                    <td><?php echo $o->RT; ?></td>
                                    <td><?php echo $o->RW; ?></td>
                                    <td align="center">

                                     <a href="<?php echo site_url('admin/delete/'.$o->NIK); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');" class="btn btn-danger btn-xs tooltips" data-popup="tooltip" data-original-title="Hapus Data" data-placement="top"><i class="glyphicon glyphicon-trash"></i></a>

                                     <a data-toggle="modal" data-target="#modal-edit<?=$o->NIK;?>" class="btn btn-danger btn-xs" data-popup="tooltip" data-original-title="Edit Data" data-placement="top" ><i class="fa fa-edit"></i></a>

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

<?php $no=0; foreach($data as $o): $no++; ?>
   <div id="modal-edit<?=$o->NIK;?>" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('admin/edit'); ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data Penduduk</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label class='col-md-3'>NIK</label>
            <div class='col-md-9'>
            <input type="text" readonly value="<?=$o->NIK;?>" name="NIK" class="form-control" required="" ></div>
          </div>
          <br>
          <div class="form-group">
            <label class='col-md-3'>Nama Lengkap</label>
            <div class='col-md-9'><input type="text" readonly value="<?=$o->nama;?>" name="nama" autocomplete="off" class="form-control"
              required="" ></div>
          </div>
          <br>
          <div class="form-group">
            <label class='col-md-3'>Jenis Kelamin</label>
            <div class='col-md-9'><input type="text" readonly value="<?=$o->jenis_kel;?>" name="jenis_kel" autocomplete="off" class="form-control"
              required="" ></div>
          </div>
              <br>
          <div class="form-group">
            <label class='col-md-3'>Tempat Lahir</label>
                <div class='col-md-9'><input type="text" value="<?=$o->tempat_lahir;?>" name="tempat_lahir" autocomplete="off" class="form-control"
              required="" ></div>
          </div>
            <br>
              <div class="form-group">
                        <label class='col-md-3'>Tanggal Lahir</label>
                       <div class='col-md-9'> <input type="text" value="<?=$o->tgl_lahir;?>"name="tgl_lahir" autocomplete="off" class="form-control"
              required="" >
                    </div>
              </div>
            <br>
            <div class="form-group">
              <label class="control-label col-md-3">Kewarganegaraan</label>
              <div class="col-md-9">
              <select name="kewarganegaraan" class="form-control">
                <option value="<?=$o->kewarganegaraan;?>"><?=$o->kewarganegaraan;?></option>
                    <option value="WNI">WNI</option>
                    <option value="WNA">WNA</option>
              </select>
              </div>
              </div>
              <br>
              <div class="form-group">
              <label class="control-label col-md-3">Agama</label>
              <div class="col-md-9">
              <select name="agama" class="form-control">
                <option value="<?=$o->agama;?>"><?=$o->agama;?></option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
              </select>
              </div>
              </div>
                <br>
              <div class="form-group">
              <label class="control-label col-md-3">Status</label>
              <div class="col-md-9">
              <select name="status" class="form-control">
                <option value="<?=$o->status;?>"><?=$o->status;?></option>
                    <option value="Menikah">Menikah</option>
                    <option value="Belum Menikah">Belum Menikah</option>
              </select>
              </div>
              </div>
              <br>
              <div class="form-group">
              <label class="control-label col-md-3">Pend. Terakhir</label>
              <div class="col-md-9">
              <select  name="pendidikan_ter" class="form-control">
                    <option value="<?=$o->pendidikan_ter;?>"><?=$o->pendidikan_ter;?></option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="Perguruan Tinggi">Perguruan Tinggi</option>
              </select>
              </div>
              </div>
              <br>
                <div class="form-group">
                    <label class='col-md-3'>Alamat</label>
                    <div class='col-md-9'><input type="text" value="<?=$o->alamat;?>" name="alamat" autocomplete="off" class="form-control" required=""></div>
                  </div>
                <br>
               <div class="form-group">
              <label class="control-label col-md-3">Pekerjaan</label>
              <div class="col-md-9">
              <select name="pekerjaan" class="form-control">
                    <option value="<?=$o->pekerjaan;?>"><?=$o->pekerjaan;?></option>
                    <option value="Pengusaha">Pengusaha</option>
                    <option value="Karyawan">Karyawan</option>
                    <option value="PNS">PNS</option>
                    <option value="IT">IT</option>
                    <option value="Programer">Programer</option>
              </select>
              </div>
              </div>
          <br>
          <div class="form-group">
              <label class="control-label col-md-3">RT</label>
              <div class="col-md-9">
              <select name="RT"  class="form-control">
                   <option value="<?=$o->RT;?>"><?=$o->RT;?></option>
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
              <select name="RW" class="form-control">
                    <option value="<?=$o->RW;?>"><?=$o->RW;?></option>
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
      </br><br><br>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Edit</button>
          </div>
    </div>
  </div>
</form>
</div>
</div>
<?php endforeach;?>
