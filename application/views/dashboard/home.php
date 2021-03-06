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
            <div class="col-lg-4 col-xs-4">
              <!-- small box -->
              <a href = "<?php echo base_url() ?>komplain/showAllKomplain/1" style = "color:white">
                <div class="small-box bg-aqua">
                  <div class="inner" style="padding-left:10px !important;">
                  <?php
                  foreach ($komplain as $row) 
                  {
                    echo '<h3>'.$row['JML_HARD_KOMPLAIN'].'</h3>';
                  }
                  ?>
                    <p>Hard Komplain</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-file-text"></i>
                  </div>
                  <a href="<?php echo base_url() ?>komplain/showAllKomplain/1" class="small-box-footer">
                    Selengkapnya <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </a>
            </div><!-- ./col -->
            
              <div class="col-lg-4 col-xs-4">
              <!-- small box -->
              <a href = "<?php echo base_url() ?>komplain/showAllKomplain/2" style = "color:white">
                <div class="small-box bg-orange">
                  <div class="inner" style="padding-left:10px !important;">
                    <?php
                    foreach ($gangguan as $row) 
                    {
                      echo '<h3>'.$row['JML_GANGGUAN'].'</h3>';
                    }
                    ?>
                    <p>Gangguan</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-gears"></i>
                  </div>
                  <a href="<?php echo base_url() ?>komplain/showAllKomplain/2" class="small-box-footer">
                    Selengkapnya <i class="fa fa-arrow-circle-right"></i>
                  </a>
              </div>
            </a>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-4">
              <!-- small box -->
              <a href = "<?php echo base_url() ?>komplain/showAllKomplain/3" style = "color:white">
                <div class="small-box bg-maroon">
                  <div class="inner" style="padding-left:10px !important;">
                    <?php
                    foreach ($psb as $row) 
                    {
                      echo '<h3>'.$row['JML_PSB'].'</h3>';
                    }
                    ?>
                    <p>PSB</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-list"></i>
                  </div>
                  <a href="<?php echo base_url() ?>komplain/showAllKomplain/3" class="small-box-footer">
                    Selengkapnya <i class="fa fa-arrow-circle-right"></i>
                  </a>
                </div>
              </a>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
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

            <?php
            if($nama == 'Administrator')
            echo '
            <div class="col-md-4 col-sm-6 col-xs-12">
              <div class="info-box">
              <a href="'. base_url() .'users">
                <span class="info-box-icon bg-navy"><i class="fa fa-user-plus"></i></span></a>
                <div class="info-box-content">
                  <span class="info-box-text">Tambah User Baru</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            ';
            ?>

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