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
                <h3 class="box-title">Tambah Data Dosen</h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                <!-- form start -->
                <form class="form-horizontal" method="post" action="<?php echo base_url('dosen/processAdd');?>">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="nik" class="col-sm-2 control-label">NIK</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="nik" placeholder="NIK"
                        name="nik" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="nama" class="col-sm-2 control-label">Nama</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" placeholder="Nama" 
                        name="nama" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="nama" class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" placeholder="Email" 
                        name="email" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="username" class="col-sm-2 control-label">Username</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" placeholder="Username" 
                        name="username" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="password" class="col-sm-2 control-label">Password</label>
                      <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="username" class="col-sm-2 control-label">Jabatan</label>
                      <div class="col-sm-10">
                        <select class="form-control select2 jabatan" name="jabatan" style="width: 100%;">
                          <option  value="kaprodi" selected="selected">Kepala Prodi</option>
                          <option value="dosen">Dosen</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group prodi" style="display: none;">
                      <label for="username" class="col-sm-2 control-label">Prodi</label>
                      <div class="col-sm-10">
                        <select class="form-control select2" name="id_prodi" style="width: 100%;">
                          <?php
                            if(!empty($prodi)){
                              foreach ($prodi as $values) {
                          ?>
                            <option value="<?php echo $values["id_prodi"];?>"><?php echo $values['prodi'];?></option>
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
                    <a href="<?php echo base_url('dosen/index')?>">
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
