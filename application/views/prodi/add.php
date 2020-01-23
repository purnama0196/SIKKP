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
          Data Prodi
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Data Prodi</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Tambah Data Prodi</h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                <!-- form start -->
                <form class="form-horizontal" method="post" action="<?php echo base_url('prodi/processAdd');?>">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="nik" class="col-sm-2 control-label">Prodi</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="prodi" placeholder="prodi"
                        name="prodi" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="username" class="col-sm-2 control-label">Ka Prodi</label>
                      <div class="col-sm-10">
                        <select class="form-control select2" name="kaprodi" style="width: 100%;">
                          <?php 
                            if(!empty($kaprodi)){
                              foreach ($kaprodi as $key => $value) {
                          ?>
                            <option value="<?php echo $value['nama_dosen']?>"><?php echo $value["nama_dosen"]?></option>
                          <?php
                              }
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Save</button>
                    <a href="<?php echo base_url('mahasiswa/index')?>">
                      <button type="button" class="btn btn-default pull-right" style="margin-right: 5px;">Cancel</button>
                    </a>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <?php $this->load->view('footer');?>
  </div><!-- ./wrapper -->
<?php $this->load->view('script_footer');?>
