
  <div class="content-wrapper">
    <div class="container">
      <section class="content-header">
        <h1>
          HOME
          <small>Example 1.0 (beta)</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url('index.php/Welcome');?>"><i class="fa fa-dashboard"></i> Home > Hasil Pencarian</a></li>
        </ol>
      </section>
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Pencarian</h3>
                <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
				<thead>
					<tr>
						<th>NO Pengantar</th>
						<th>NIK</th>
						<th width ='20%'>Tanggal Berlaku</th>
						<th width ='25%'>Tanggal Pengantar</th>
						<th width ='16%'>Keperluan</th>
						<th width ='16%'>Lain Lain</th>
						<th width ='12%'>Status RT</th>
						<th width ='12%'>Status RW</th>
						<th width ='18%'>Keterangan</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($data as $row):?>
					<tr>
						<td><?php echo $row->no_pengantar;?> </td>
						<td><?php echo $row->NIK;?></td>
						<td><?php echo $row->tanggal_berlaku ?></td>
                        <td><?php echo $row->tgl_pengantar ?></td>
                        <td><?php echo $row->keperluan ?></td>
                        <td><?php echo $row->lain_lain ?></td>
                        <td>
                        	<?php if($row->status_rt==1){
                  echo "<span class='label label-danger'> Belum Validasi</span>";
                  $site=site_url('pengantar_c/search/'.$row->no_pengantar);
                  //$teks="Nonaktifkan Data";
                  $icon="switch";
                  $class="danger";
                }elseif($row->status_rt==2){
                  echo "<span class='label label-info'> Validasi</span>";
                  $site=site_url('pengantar_c/search/'.$row->no_pengantar);
                  //$teks="Aktifkan Data";
                  $icon="switch";
                  $class="info";
                  }else{
                  echo "<label class='label label-primary> Lainnya</label>";
                  $site=site_url('pengantar_c/search/'.$row->no_pengantar);
                  //$teks="Aktifkan Data";
                  $icon="switch";
                  $class="default";
                }?>
                        </td>
                        <td>
                        	<?php if($row->status_rw==1){
                  echo "<span class='label label-danger'> Belum Validasi</span>";
                  $site=site_url('pengantar_c/search/'.$row->no_pengantar);
                  //$teks="Nonaktifkan Data";
                  $icon="switch";
                  $class="danger";
                }elseif($row->status_rw==2){
                  echo "<span class='label label-info'> validasi</span>";
                  $site=site_url('pengantar_c/search/'.$row->no_pengantar);
                  //$teks="Aktifkan Data";
                  $icon="switch";
                  $class="info";
                  }else{
                  echo "<label class='label label-primary> Lainnya</label>";
                  $site=site_url('pengantar_c/search/'.$row->no_pengantar);
                  //$teks="Aktifkan Data";
                  $icon="switch";
                  $class="default";
                }?>
                        </td>
                        <td><?php echo $row->keterangan ?></td>
					</tr>
				<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
</div>
</div>

