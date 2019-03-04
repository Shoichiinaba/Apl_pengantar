
<div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Cetak Pengantar 
          <small>Example 1.0 (beta)</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo site_url(''); ?>"><i class="fa fa-dashboard"></i> Home > Cari Laporan</a></li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
        <div class="col-xs-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Masukan <b> Nomer Pengantar<b></h3>
            </div>
            <div class="box-body">
               <div class="modal-body">
                <form id="form_search" action="<?php echo site_url('cetak/search');?>" method="GET">
                
                  <div class="form-group">
                 <div class="input-group input-group-xs">
                <input type="text" class="form-control" name="no_pengantar" placeholder="Masukan No Pengantar">
               
                <span class="input-group-btn">
                      <button type="submit" name="submit" class="btn btn-info btn-flat">Cari!</button>
                    </span>
              </div>
            </div>

                </form>
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
