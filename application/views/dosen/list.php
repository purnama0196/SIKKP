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
          Data Dosen
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Data Dosen</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">List Data Dosen</h3>
                <a href="<?php echo base_url('dosen/add')?>">
                  <button style="float: right;" class="btn btn-primary">Tambah</button>
                </a>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>NIK</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      if(!empty($dosen)){
                        foreach ($dosen as $value) {
                    ?>
                      <tr>
                        <td><?php echo $value["nik"];?></td>
                        <td><?php echo $value["nama_dosen"];?></td>
                        <td><?php echo $value["email"];?></td>
                        <td>
                          <a href="<?php echo base_url("dosen/edit/" . $value['id_dosen']);?>">
                            <button class="btn btn-warning lg">
                              <i class="fa fa-edit"></i>
                            </button>
                          </a>

                          <a href="<?php echo base_url("dosen/delete/" . $value['id_dosen']);?>">
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
