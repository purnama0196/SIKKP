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
          <?php echo $kkp->judul;?>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li>Data Pengajuan KKP</li>
          <li class="active"><?php echo $kkp->judul;?></li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <a href="<?php echo base_url('kkp/index')?>">
                  <button style="float: right;margin-left: 5px;" class="btn btn-default">Kembali</button>
                </a>&nbsp;&nbsp;
                <?php if($this->session->userdata('role') == 4 && $kkp->status_approval == 0){ ?>
                  <a href="<?php echo base_url('kkp/addDetail/' . $kkp->id_form)?>">
                    <button style="float: right;" class="btn btn-primary">Tambah</button>
                  </a>
                <?php } ?>
                
                
              </div><!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>NIM</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Telepon</th>
                      <th>Jenjang Pendidikan</th>
                      <th>Program Studi</th>
                      <th>Tempat/Tanggal Lahir</th>
                      <th>Alamat</th>
                      <?php if($this->session->userdata('role') == 4 && $kkp->status_approval == 0){ ?>
                        <th width="15%">Action</th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      if(!empty($kkp_detail)){
                        foreach ($kkp_detail as $key => $value) {
                    ?>
                    <tr>
                      <td><?php echo $value['nim_mahasiswa']?></td>
                      <td><?php echo $value['nama_mahasiswa']?></td>
                      <td><?php echo $value['email']?></td>
                      <td><?php echo $value['telepon']?></td>
                      <td><?php echo $value['jenjang_pendidikan']?></td>
                      <td><?php echo $value['program_studi']?></td>
                      <td><?php echo $value['tempat_lahir']?>&nbsp;/&nbsp;<?php echo $value['tanggal_lahir']?></td>
                      <td><?php echo $value['alamat']?></td>
                      <?php if($this->session->userdata('role') == 4 && $kkp->status_approval == 0){ ?>
                      <td>
                          <a href="<?php echo base_url('kkp/editDetail/' . $value['id_form_detail'])?>">
                            <button class="btn btn-warning" type="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                          </a>
                          <a href="<?php echo base_url('kkp/deleteDetail/' . $value['id_form_detail'] . '/' . $kkp->id_form)?>">
                            <button class="btn btn-danger" type="button"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                          </a>
                      </td>
                       <?php } ?>
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
