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
          <li>Pengajuan KKP</li>
          <li class="active"><?php echo $kkp->judul;?></li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-body">
                <!-- form start -->
                <form class="form-horizontal" method="post" action="<?php echo base_url('kkp/processAddDetail/' . $kkp->id_form);?>">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="judul" class="col-sm-2 control-label">NIM</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="nim_mahasiswa" placeholder="NIM"
                        name="nim_mahasiswa" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="penerima1" class="col-sm-2 control-label">Nama</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_mahasiswa" placeholder="Nama"
                        name="nama_mahasiswa" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="penerima2" class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" placeholder="Email"
                        name="email" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="telepon" class="col-sm-2 control-label">Telepon</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="telepon" placeholder="Telepon"
                        name="telepon" required>
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
                      <label for="prodi" class="col-sm-2 control-label">Program Studi</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="program_studi" placeholder="Program Studi"
                        name="program_studi" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="divisi" class="col-sm-2 control-label">Tempat Lahir</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir"
                        name="tempat_lahir" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="divisi" class="col-sm-2 control-label">Tanggal Lahir</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="tanggal_lahir" placeholder="Tanggal Lahir"
                        name="tanggal_lahir" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="divisi" class="col-sm-2 control-label">Alamat</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" rows="5" cols="10" name="alamat"></textarea>
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Save</button>
                    <a href="<?php echo base_url('kkp/detail/' . $kkp->id_form)?>">
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
