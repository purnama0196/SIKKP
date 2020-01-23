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
          Pengajuan KKP
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Pengajuan KKP</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Pengajuan KKP</h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                <!-- form start -->
                <form class="form-horizontal" method="post" action="<?php echo base_url('kkp/processAdd');?>">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="judul" class="col-sm-2 control-label">Judul</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="judul" placeholder="Judul"
                        name="judul" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="penerima1" class="col-sm-2 control-label">Penerima 1</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="penerima1" placeholder="Penerima 1"
                        name="penerima1" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="penerima2" class="col-sm-2 control-label">Penerima 2</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="penerima2" placeholder="Penerima 2"
                        name="penerima2" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="nama_perusahaan" class="col-sm-2 control-label">Nama Perusahan</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_perusahaan" placeholder="Nama Perusahaan"
                        name="nama_perusahaan" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="alamat_perusahaan" class="col-sm-2 control-label">Alamat Perusahan</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat_perusahaan" placeholder="Alamat Perusahaan"
                        name="alamat_perusahaan" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="jenjang_pendidikan" class="col-sm-2 control-label">Jenjang Pendidikaan</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="jenjang_pendidikan" placeholder="Jenjang Pendidikan"
                        name="jenjang_pendidikan" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="prodi" class="col-sm-2 control-label">Prodi</label>
                      <div class="col-sm-10">
                        <select class="form-control select2" name="prodi" style="width: 100%;">
                          <?php 
                            if(!empty($prodi)){
                              foreach ($prodi as $key => $value) {
                          ?>
                            <option value="<?php echo $value['id_prodi']?>"><?php echo $value["prodi"]?></option>
                          <?php
                              }
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="divisi" class="col-sm-2 control-label">Divisi</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="divisi" placeholder="Divisi"
                        name="divisi" required>
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Save</button>
                    <a href="<?php echo base_url('kkp/index')?>">
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
