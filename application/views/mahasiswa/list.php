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
          Data Mahasiswa
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Data Mahasiswa</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">List Data Mahasiswa</h3>
                <a href="<?php echo base_url('mahasiswa/add')?>">
                  <button style="float: right;" class="btn btn-primary">Tambah</button>
                </a>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>NIM</th>
                      <th>Nama</th>
                      <th>Tempat/Tanggal Lahir</th>
                      <th>Prodi</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      if(!empty($mahasiswa)){
                        foreach ($mahasiswa as $value) {
                    ?>
                      <tr>
                        <td><?php echo $value["nim"];?></td>
                        <td><?php echo $value["nama"];?></td>
                        <td><?php echo $value["tempat_lahir"] . ", " . $value["tanggal_lahir"] ;?></td>
                        <td><?php echo $value["prodi"];?></td>
                        <td>
                          <a href="<?php echo base_url("mahasiswa/edit/" . $value['id_mahasiswa']);?>">
                            <button class="btn btn-warning lg">
                              <i class="fa fa-edit"></i>
                            </button>
                          </a>

                          <a href="<?php echo base_url("mahasiswa/delete/" . $value['id_mahasiswa']);?>">
                            <button class="btn btn-danger lg">
                              <i class="fa fa-trash"></i>
                            </button>
                          </a>
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
