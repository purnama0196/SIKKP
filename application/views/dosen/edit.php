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
                <form class="form-horizontal" method="post" action="<?php echo base_url('dosen/processEdit');?>">
                  <div class="box-body">
                    <input type="hidden" class="form-control" id="id"
                        name="id" value="<?php echo $dosen->id_dosen;?>">
                    <div class="form-group">
                      <label for="nik" class="col-sm-2 control-label">NIK</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="nik" placeholder="NIK"
                        name="nik" value="<?php echo $dosen->nik;?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="nama" class="col-sm-2 control-label">Nama</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" placeholder="Nama" 
                        name="nama" required value="<?php echo $dosen->nama_dosen;?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="nama" class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" placeholder="Email" 
                        name="email" value="<?php echo $dosen->email;?>"  required>
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
