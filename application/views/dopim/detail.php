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
          Detail Pengajuan Dosen Pembimbing
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
              <div class="box-body">
                <div style="font-size:18px;font-weight: bold;">
                  Detail Data Pengajuan Dosen Pembimbing
                </div>
                <table class="table table-bordered table-striped">
                  <tbody>
                    <tr>
                      <th>Kaprodi</th>
                      <td><?php echo $user->nama_dosen;?></td>
                    </tr>

                    <tr>
                      <th>NIK - Nama Dopim</th>
                      <td>
                        <?php
                          if(!empty($dosen)){
                            foreach ($dosen as $values) {
                              if($values["id_dosen"] == $dopim->id_dosen){
                                echo $values['nik'] . ' - ' . $values['nama_dosen'];
                              }
                            }
                          }
                        ?>
                      </td>
                    </tr>

                    <tr>
                      <th>Topik</th>
                      <td>
                        <?php echo $dopim->topik;?>
                      </td>
                    </tr>

                    <tr>
                      <th>Tujuan Tema</th>
                      <td>
                        <?php echo $dopim->tujuan_tema;?>
                      </td>
                    </tr>

                    <tr>
                      <th>Judul Laporan KKP</th>
                      <td>
                        <?php echo $dopim->judul_laporan_kkp;?>
                      </td>
                    </tr>

                    <tr>
                      <th>File Dokumen</th>
                      <td>
                        <a href="<?=base_url('upload/' . $dopim->files)?>" target="_blank"><?php echo $dopim->files;?></a>
                      </td>
                    </tr>
                  </tbody>
                </table>

                <div style="font-size:18px;font-weight: bold;margin-top: 30px;">
                  List Mahasiswa
                </div>
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
                    </tr>
                    <?php
                        }
                      }
                    ?>
                  </tbody>
                </table>
              </div><!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo base_url('dopim/index')?>">
                  <button style="float: left;margin-left: 5px;" class="btn btn-default">Kembali</button>
                </a>
              </div>
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <?php $this->load->view('footer');?>
  </div><!-- ./wrapper -->
<?php $this->load->view('script_footer');?>
