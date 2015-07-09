      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Selamat Datang, <?php echo $nama ?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
          <h4>
            Statistik
          </h4>
          <hr style="border-color:#55E0DE;">

          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                <?php
                foreach ($komplain as $row) 
                {
                  echo '<h3>'.$row['JML_KOMPLAIN'].'</h3>';
                }
                ?>
                  <p>Komplain</p>
                </div>
                <div class="icon">
                  <i class="fa fa-file-text"></i>
                </div>
                <a href="<?php echo base_url() ?>komplain/showAllKomplain" class="small-box-footer">
                  Selengkapnya <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-orange">
                <div class="inner">
                  <?php
                  foreach ($layanan as $row) 
                  {
                    echo '<h3>'.$row['JML_LAYANAN'].'</h3>';
                  }
                  ?>
                  <p>Layanan Terdaftar</p>
                </div>
                <div class="icon">
                  <i class="fa fa-gears"></i>
                </div>
                <a href="<?php echo base_url() ?>layanan" class="small-box-footer">
                  Selengkapnya <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-purple">
                <div class="inner">
                  <?php
                  foreach ($jenis as $row) 
                  {
                    echo '<h3>'.$row['JML_JENIS'].'</h3>';
                  }
                  ?>
                  <p>Jenis KomplainTerdaftar</p>
                </div>
                <div class="icon">
                  <i class="fa fa-list"></i>
                </div>
                <a href="<?php echo base_url() ?>jenis_komplain" class="small-box-footer">
                  Selengkapnya <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-maroon">
                <div class="inner">
                  <?php
                  foreach ($media as $row) 
                  {
                    echo '<h3>'.$row['JML_MEDIA'].'</h3>';
                  }
                  ?>
                  <p>Media Terdaftar</p>
                </div>
                <div class="icon">
                  <i class="fa fa-phone-square"></i>
                </div>
                <a href="<?php echo base_url() ?>media" class="small-box-footer">
                  Selengkapnya <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->

          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-olive">
                <div class="inner">
                  <?php
                  foreach ($janjiall as $row) 
                  {
                    echo '<h3>'.$row['JML_JANJI_ALL'].'</h3>';
                  }
                  ?>
                  <p>Janji Belum Ditangani</p>
                </div>
                <div class="icon">
                  <i class="fa fa-file-text"></i>
                </div>
                <a href="<?php echo base_url() ?>janji" class="small-box-footer">
                  Selengkapnya <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <?php
                  foreach ($janjipast as $row) 
                  {
                    echo '<h3>'.$row['JML_JANJI_PAST'].'</h3>';
                  }
                  ?>
                  <p>Janji Melewati Deadline</p>
                </div>
                <div class="icon">
                  <i class="fa fa-exclamation-circle"></i>
                </div>
                <a href="<?php echo base_url() ?>janji/lewat_deadline" class="small-box-footer">
                  Selengkapnya <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <?php
                  foreach ($janjioneday as $row) 
                  {
                    echo '<h3>'.$row['JML_JANJI_ONE_DAY'].'</h3>';
                  }
                  ?>
                  <p>Janji Mendekati Deadline</p>
                </div>
                <div class="icon">
                  <i class="fa fa-exclamation-triangle"></i>
                </div>
                <a href="<?php echo base_url() ?>janji/sehari_deadline" class="small-box-footer">
                  Selengkapnya <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <?php
                  foreach ($janjibefore as $row) 
                  {
                    echo '<h3>'.$row['JML_JANJI_BEFORE'].'</h3>';
                  }
                  ?>
                  <p>Janji Sebelum Deadline</p>
                </div>
                <div class="icon">
                  <i class="fa fa-tasks"></i>
                </div>
                <a href="<?php echo base_url() ?>janji/sebelum_deadline" class="small-box-footer">
                  Selengkapnya <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->

          <h4>
            Pintasan Cepat
          </h4>
          <hr style="border-color:#55E0DE;">

          <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="info-box">
              <a href="<?php echo base_url() ?>komplain">
                <span class="info-box-icon bg-aqua"><i class="fa fa-file-text"></i></span></a>
                <div class="info-box-content">
                  <span class="info-box-text">Tambah Komplain</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="info-box">
              <a href="<?php echo base_url() ?>files/template_komplain_telkom.xls">
                <span class="info-box-icon bg-green"><i class="fa fa-download"></i></span></a>
                <div class="info-box-content">

                  <span class="info-box-text visible-sm">Unduh Template</span>
                  <span class="info-box-text visible-sm visible-xs">Excel</span>
                  <span class="info-box-text hidden-sm">Unduh Template Excel</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="info-box">
              <a href="<?php echo base_url() ?>media/tambah">
                <span class="info-box-icon bg-maroon"><i class="fa fa-phone-square"></i></span></a>
                <div class="info-box-content">
                  <span class="info-box-text">Tambah Media</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="info-box">
              <a href="<?php echo base_url() ?>layanan/tambah">
                <span class="info-box-icon bg-orange"><i class="fa fa-gears"></i></span></a>
                <div class="info-box-content">
                  <span class="info-box-text">Tambah Layanan</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="info-box">
              <a href="<?php echo base_url() ?>jenis_komplain/tambah">
                <span class="info-box-icon bg-purple"><i class="fa fa-list"></i></span></a>
                <div class="info-box-content">

                  <span class="info-box-text visible-sm">Tambah Jenis</span>
                  <span class="info-box-text visible-sm visible-xs">Komplain</span>
                  <span class="info-box-text hidden-sm">Tambah Jenis Komplain</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->