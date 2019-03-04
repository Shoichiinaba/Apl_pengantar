
<div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Cetak Pengantar 
          <small>Example 1.0 (beta)</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo site_url(''); ?>"><i class="fa fa-dashboard"></i> Home > Hasil Cari Cetak Pengantar</a></li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
        <div class="col-xs-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Hasil Cari<b> Cetak pengantar<b></h3>
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
                                      
                                         <?php $no=  0; foreach($cetak as $val ): $no++;?>
                                    <tr>
                                        <td><?php echo $val->no_pengantar; ?></td>
                                        <td><?php echo $val->NIK; ?></td>
                                        <td><?php echo $val->nama; ?></td>
                                        <td><?php echo $val->tanggal_berlaku; ?></td>
                                        <td><?php echo $val->tgl_pengantar; ?></td>
                                        <td><?php echo $val->keperluan; ?></td>
                                        <td><?php echo $val->lain_lain; ?></td>
                                        <td align="center">

                                            <a target="_blank" href="<?php echo base_url('/laporan/cetak/'.$val->no_pengantar); ?>"class="btn btn-success btn-xs" >
                                            <i class="glyphicon glyphicon-print" class="btn btn-success btn-xs tooltips" data-toggle="tooltip"data-placement="bottom" title="Print"></i></a>
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
  </div>
</div>    
</div>
</div>
</div>
