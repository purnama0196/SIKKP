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
          Pengajuan Dosen Pembimbing
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Pengajuan Dosen Pembimbing</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Pengajuan Dosen Pembimbing</h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                <!-- form start -->
                <form class="form-horizontal" method="post" action="<?php echo base_url('dopim/processAdd');?>">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="kaprodi" class="col-sm-2 control-label">KaProdi</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="kaprodi" value="<?php echo $user->nama_dosen?>"
                        placeholder="<?php echo $user->nama_dosen;?>" name="kaprodis" disabled>
                        <input type="hidden" class="form-control" id="kaprodi" value="<?php echo $user->id_dosen;?>" name="kaprodi">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="nik_dosen" class="col-sm-2 control-label">NIK - Nama Dopim</label>
                      <div class="col-sm-10">
                        <select class="form-control select2" name="id_dosen" style="width: 100%;">
                          <?php
                            if(!empty($dosen)){
                              foreach ($dosen as $values) {
                          ?>
                            <option value="<?php echo $values["id_dosen"];?>"><?php echo $values['nik'] . ' - ' . $values['nama_dosen'];?></option>
                          <?php
                              }
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="topik" class="col-sm-2 control-label">Topik</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="topik" placeholder="Topik"
                        name="topik" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="tujuan_tema" class="col-sm-2 control-label">Tujuan Tema</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="tujuan_tema" placeholder="Tujuan Tema"
                        name="tujuan_tema" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="judul_laporan_kkp" class="col-sm-2 control-label">Judul Laporan KKP</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="judul_laporan_kkp" placeholder="Judul Laporan KKP"
                        name="judul_kkp" value="<?php echo $kkp->judul;?>" disabled="true" required>
                        <input type="hidden" name="id_kkp" value="<?php echo $kkp->id_form;?>">
                        <input type="hidden" name="judul_laporan_kkp" value="<?php echo $kkp->judul;?>">
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Save</button>
                    <a href="<?php echo base_url('dopim/index')?>">
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
