<?php
$controller = $this->router->fetch_class();
$level = $this->session->userdata('ap_level');
?>


<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>assets/img/<?php echo $userdata->foto; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $userdata->nama; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <?php if ($userdata->level=='1' ):
          $this->load->view('template/dasbo');
          $this->load->view('template/masda');
          $this->load->view('template/menkel');?>
        <?php endif ;?>

        <?php if ($userdata->level=='2' ):
          $this->load->view('template/dasbo');
          $this->load->view('template/masda');
          $this->load->view('template/menrw');?>
        <?php endif ;?>

        <?php if ($userdata->level=='3' ):
          $this->load->view('template/dasbo');
          $this->load->view('template/masda');
          $this->load->view('template/menrt');?>
        <?php endif ;?>

      
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>