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
          Data Pengajuan Dosen Pembimbing
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Data Pengajuan Dosen Pembimbing</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">List Data Pengajuan Dosen Pembimbing</h3>
                <?php
                  if(empty($dopim)){
                     //&& $value[$kkp.'status_approval'] == 4
                    // var_dump($kkp.'status_approval');
                ?>
                  <a href="<?php echo base_url('dopim/add')?>">
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
                      <th>KaProdi</th>
                      <th>NIK - Nama Dopim</th>
                      <th>Topik</th>
                      <th>Tujuan Tema</th>
                      <th>Judul Laporan KKP</th>
                      <th>Status Approval</th>
                      <th width="20%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      if(!empty($dopim)){
                        foreach ($dopim as $key => $value) {
                    ?>
                    <tr>
                      <td><?php echo $value['nama_dosen']?></td>
                      <td>
                        <?php
                          if(!empty($dosen)){
                            foreach ($dosen as $values) {
                              if($value['id_dosen'] == $values['id_dosen']){
                        ?>
                              <?php echo $values['nik'] . ' - ' . $values['nama_dosen']?>
                        <?php
                              }
                            }
                          }
                        ?>    
                      </td>
                      <td><?php echo $value['topik']?></td>
                      <td><?php echo $value['tujuan_tema']?></td>
                      <td><?php echo $value['judul_laporan_kkp']?></td>
                      <td>
                        <?php
                          if($value['status_approval'] == 0){
                            echo 'Pengajuan baru';
                          }else if($value['status_approval'] == 1){
                            echo 'Menunggu akseptasi KaProdi';
                          }else if($value['status_approval'] == 2){
                            echo 'Pengajuan disetujui KaProdi';
                          }else if($value['status_approval'] == 3){
                            echo 'Pengajuan ditolak KaProdi';
                          }else if($value['status_approval'] == 4){
                            echo 'Pengajuan disetujui Koordinator KKP';
                          }else{
                            echo 'Pengajuan ditolak Koordinator KKP';
                          }
                        ?>
                      </td>
                      <td>
                        <?php if($value['status_approval'] == 0 && $this->session->userdata('role') == 4){ ?>
                          <a href="<?php echo base_url('dopim/edit/' . $value['id_form_dopim'])?>">
                            <button class="btn btn-warning" type="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                          </a>
                          <a href="<?php echo base_url('dopim/delete/' . $value['id_form_dopim'])?>">
                            <button class="btn btn-danger" type="button"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                          </a>
                          <a href="<?php echo base_url('dopim/sendApproval/' . $value['id_form_dopim'])?>">
                            <button class="btn btn-info" type="button"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                          </a>
                        <?php } ?>
                        <a href="<?php echo base_url('dopim/detail/' . $value['id_form_dopim'])?>">
                          <button class="btn btn-success" type="button"><i class="fa fa-eye" aria-hidden="true"></i></button>
                        </a>
                        <?php if($value['status_approval'] == 1 && $this->session->userdata('role') == 2){ ?>
                          <a href="<?php echo base_url('dopim/approveKaProdi/' . $value['id_form_dopim'])?>">
                            <button class="btn btn-warning" type="button"><i class="fa fa-check" aria-hidden="true"></i></button>
                          </a>
                          <a href="<?php echo base_url('dopim/rejectKaProdi/' . $value['id_form_dopim'])?>">
                            <button class="btn btn-danger" type="button"><i class="fa fa-close" aria-hidden="true"></i></button>
                          </a>
                        <?php } ?>

                        <?php if($value['status_approval'] == 2 && $this->session->userdata('role') == 1){ ?>
                          <a href="<?php echo base_url('dopim/approveAdmin/' . $value['id_form_dopim'])?>">
                            <button class="btn btn-warning" type="button"><i class="fa fa-check" aria-hidden="true"></i></button>
                          </a>
                          <a href="<?php echo base_url('dopim/rejectAdmin/' . $value['id_form_dopim'])?>">
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
