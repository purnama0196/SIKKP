<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu">
    <li class="active"><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <?php 
      if((int)$this->session->userdata('role') == 1){
    ?>
      <li><a href="<?php echo base_url('prodi/index')?>"><i class="fa fa-book"></i> Prodi</a></li>
      <li><a href="<?php echo base_url('dosen/index')?>"><i class="fa fa-user"></i> Dosen</a></li>
      <li><a href="<?php echo base_url('mahasiswa/index')?>"><i class="fa fa-users"></i> Mahasiswa</a></li>
    <?php 
      } 
    ?>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-file"></i>
        <span>KKP</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?php echo base_url("kkp/index")?>"><i class="fa fa-square"></i> Pengajuan KKP</a></li>
        <?php if(!empty($reject) && $reject == 2){?>
        <li><a href="pages/charts/morris.html"><i class="fa fa-building-o"></i> Revisi Pengajuan KKP</a></li>
        <?php } ?>
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-file"></i>
        <span>DoPim</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="<?php echo base_url("dopim/index")?>"><i class="fa fa-square"></i> Pengajuan DoPim</a></li>
        <?php if(!empty($reject) && $reject == 2){?>
        <li><a href="pages/charts/morris.html"><i class="fa fa-building-o"></i> Revisi Pengajuan DoPim</a></li>
        <?php } ?>
      </ul>
    </li>
    <?php if(!empty($reject)){?>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-navicon"></i>
        <span>Dosen Pembimbing</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
        <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
      </ul>
    </li>
    <?php } ?>
  </ul>
</section>
<!-- /.sidebar -->