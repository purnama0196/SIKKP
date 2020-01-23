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
                <h3 class="box-title">Edit Data Mahasiswa</h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                <!-- form start -->
                <form class="form-horizontal" method="post" action="<?php echo base_url('mahasiswa/processEdit');?>">
                  <input type="hidden" class="form-control" id="id"
                        name="id" value="<?php echo $mahasiswa->id_mahasiswa;?>">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="nik" class="col-sm-2 control-label">NIM</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="nim" placeholder="NIM"
                        name="nim" value="<?php echo $mahasiswa->nim;?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="nama" class="col-sm-2 control-label">Nama</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" placeholder="Nama"
                        name="nama" value="<?php echo $mahasiswa->nama;?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="prodi" class="col-sm-2 control-label">Prodi</label>
                      <div class="col-sm-10">
                        <select class="form-control select2" name="prodi" style="width: 100%;">
                          <?php 
                            if(!empty($prodi)){
                              foreach ($prodi as $key => $value) {
                                if($mahasiswa->kode_prodi == $value["id_prodi"]){
                          ?>
                            <option value="<?php echo $value['id_prodi']?>" selected><?php echo $value["prodi"]?></option>
                          <?php }else{ ?>
                            <option value="<?php echo $value['id_prodi']?>"><?php echo $value["prodi"]?></option>
                          <?php
                                }
                              }
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="nama" class="col-sm-2 control-label">Tempat Lahir</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir"
                        name="tempat_lahir" value="<?php echo $mahasiswa->tempat_lahir;?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="tanggal_lahir" class="col-sm-2 control-label">Tanggal Lahir</label>
                      <div class="col-sm-10">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name="tanggal_lahir" placeholder="Tanggal Lahir"
                          value="<?php echo $mahasiswa->tanggal_lahir;?>">
                        </div><!-- /.input group -->
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
