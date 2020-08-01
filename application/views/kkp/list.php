<?php echo $this->load->view('script_header')?>
  <div class="wrapper">
    <?php echo $this->load->view('header')?>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <?php echo $this->load->view('menu');?>
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Data Pengajuan KKP
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Data Pengajuan KKP</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">List Data Pengajuan KKP</h3>
                <?php
                  if(empty($kkp) && $this->session->userdata('role') == 4){
                ?>
                  <a href="<?php echo base_url('kkp/add')?>">
                    <button style="float: right;" class="btn btn-primary">Tambah</button>
                  </a>
                <?php 
                  } 
                ?>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Judul</th>
                      <th>Penerima 1</th>
                      <th>Penerima 2</th>
                      <th>Nama Perusahaan</th>
                      <th>Alamat Perusahaan</th>
                      <th>Jenjang Pendidikan</th>
                      <th>Prodi</th>
                      <th>Divisi</th>
                      <th>Status Approval</th>
                      <th width="20%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      if(!empty($kkp)){
                        foreach ($kkp as $key => $value) {
                    ?>
                    <tr>
                      <td><?php echo $value['judul']?></td>
                      <td><?php echo $value['penerima_satu']?></td>
                      <td><?php echo $value['penerima_dua']?></td>
                      <td><?php echo $value['nama_perusahaan']?></td>
                      <td><?php echo $value['alamat_perusahaan']?></td>
                      <td><?php echo $value['jenjang_pendidikan']?></td>
                      <td><?php echo $value['nama_prodi']?></td>
                      <td><?php echo $value['divisi']?></td>
                      <td>
                        <?php
                          if($value['status_approval'] == 0){
                            echo 'Pengajuan baru';
                          }else if($value['status_approval'] == 1){
                            echo 'Menunggu akseptasi Koordinator KKP';
                          }else if($value['status_approval'] == 2){
                            echo 'Pengajuan disetujui Koordinator KKP (Menunggu akseptasi KaProdi)';
                          }else if($value['status_approval'] == 3){
                            echo 'Pengajuan ditolak Koordinator KKP';
                          }else if($value['status_approval'] == 4){
                            echo 'Pengajuan disetujui KaProdi';
                          }else{
                            echo 'Pengajuan ditolak KaProdi';
                          }
                        ?>
                      </td>
                      <td>
                        <?php if(($value['status_approval'] == 0 || $value['status_approval'] == 3 || $value['status_approval'] == 5) && $this->session->userdata('role') == 4){ ?>
                          <a href="<?php echo base_url('kkp/edit/' . $value['id_form'])?>">
                            <button class="btn btn-warning" type="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                          </a>
                          <a href="<?php echo base_url('kkp/delete/' . $value['id_form'])?>">
                            <button class="btn btn-danger" type="button"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                          </a>
                          <a href="<?php echo base_url('kkp/sendApproval/' . $value['id_form'])?>">
                            <button class="btn btn-info" type="button"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                          </a>
                        <?php } ?>
                        <a href="<?php echo base_url('kkp/detail/' . $value['id_form'])?>">
                          <button class="btn btn-success" type="button"><i class="fa fa-eye" aria-hidden="true"></i></button>
                        </a>
                        <?php if($value['status_approval'] == 1 && $this->session->userdata('role') == 1){ ?>
                          <a href="<?php echo base_url('kkp/approveAdmin/' . $value['id_form'])?>">
                            <button class="btn btn-warning" type="button"><i class="fa fa-check" aria-hidden="true"></i></button>
                          </a>
                          <a href="<?php echo base_url('kkp/rejectAdmin/' . $value['id_form'])?>">
                            <button class="btn btn-danger" type="button"><i class="fa fa-close" aria-hidden="true"></i></button>
                          </a>
                        <?php } ?>

                        <?php if($value['status_approval'] == 2 && $this->session->userdata('role') == 2){ ?>
                          <a href="<?php echo base_url('kkp/approveKaProdi/' . $value['id_form'])?>">
                            <button class="btn btn-warning" type="button"><i class="fa fa-check" aria-hidden="true"></i></button>
                          </a>
                          <a href="<?php echo base_url('kkp/rejectKaProdi/' . $value['id_form'])?>">
                            <button class="btn btn-danger" type="button"><i class="fa fa-close" aria-hidden="true"></i></button>
                          </a>
                        <?php } ?>
                      </td>
                    </tr>
                    <?php
                        }
                      }
                    ?>
                  </tbody>
                </table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <?php $this->load->view('footer');?>
  </div><!-- ./wrapper -->
<?php $this->load->view('script_footer');?>
