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

<?php 
        $data=$this->session->flashdata('sukses');
        if($data!=""){ ?>
        <div id="notifikasi" class="alert alert-info"><strong>Sukses! </strong> <?=$data;?></div>
        <?php } ?>

        <?php 
        $data2=$this->session->flashdata('error');
         if($data2!=""){ ?>
         <div id="notifikasi" class="alert alert-warning"><strong> Error! </strong> <?=$data2;?></div>
          <?php } ?>

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
                                            <th>Username</th>
                                            <th >Password</th>
                                            <th >Nama</th>
                                            <th >Role</th>
                                            <th>Level</th>
                                            <th >RT</th>
                                            <th >RW</th>
                                            <th width ='10%'>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php $no=  0; foreach($user as $us ): $no++;?>
                                    <tr>
                                        <td><?php echo $us->id; ?></td>
                                        <td><?php echo $us->username; ?></td>
                                        <td><?php echo $us->password; ?></td>
                                        <td><?php echo $us->nama; ?></td>
                                        <td><?php echo $us->role; ?></td>
                                        <td><?php echo $us->level; ?></td>
                                        <td><?php echo $us->RT; ?></td>
                                        <td><?php echo $us->RW; ?></td>
                                        <td align="center">

                                          <?php echo @$menkel; ?> 
                                            <a data-toggle="modal" data-target="" class="btn btn-danger btn-xs" data-popup="tooltip" data-original-title="Edit Data" data-placement="top" ><i class="fa fa-check-square-o"></i></a>

                                            <a href="<?php echo site_url(); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');" class="btn btn-danger btn-xs tooltips" data-popup="tooltip" data-original-title="Hapus Data" data-placement="top"><i class="glyphicon glyphicon-trash"></i></a>

                                    </tr>
                                     <?php endforeach;?>
                                </tbody>
                             </table>
                                <div class="box-body">
                                      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-tambah">
                                            Tambah User
                                      </button>
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
            <label class='col-md-3'>Username</label>
            <div class='col-md-9'>
            <input type="text" name="username" class="form-control" required="" ></div>
          </div>
          <br>
          <div class="form-group">
            <label class='col-md-3'>ID Petugas</label>
            <div class='col-md-9'><input type="text"  value="<?=$us->id_petugas;?>" name="id_petugas"  autocomplete="off" class="form-control"
              required="" ></div>
          </div>
          <br>
          <div class="form-group">
            <label class='col-md-3'>Password</label>
            <div class='col-md-9'><input type="text" name="password"  autocomplete="off" class="form-control"
              required="" ></div>
          </div>
          <br>
          <div class="form-group">
              <label class="control-label col-md-3">Level</label>
              <div class="col-md-9">
              <select name="level" class="form-control">
                    <option value="">Pilih Level</option>
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
</div>
