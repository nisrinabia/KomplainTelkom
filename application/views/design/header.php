<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Karin</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url() ?>assets/style.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/logo.ico')?>">
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url() ?>assets/bootstrap3/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Buat tanggal -->
    <link href="<?php echo base_url() ?>assets/bootstrap/css/datepicker.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    
    <link href="<?php echo base_url() ?>assets/ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- daterange picker -->
    <link href="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="<?php echo base_url() ?>assets/plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Color Picker -->
    <link href="<?php echo base_url() ?>assets/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet"/>
    <!-- Bootstrap time Picker -->
    <link href="<?php echo base_url() ?>assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
    <!-- Theme style -->
    <link href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    
    <!-- tambahan bootstrap3 -->
    <link href="<?php echo base_url() ?>assets/bootstrap3/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/bootstrap3/prettify-1.0.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/style.css" rel="stylesheet" type="text/css" />
  </head>
  <script type="text/javascript">
        function preloader(){
            document.getElementById("preloader").style.display = "none";
            document.getElementById("container").style.display = "block";
        }//preloader
        window.onload = preloader;
</script>
  <style>
    .error {color: #FF0000;}
  </style>
  <body class="skin-red-light sidebar-mini fixed ">
  <!-- <div id="preloader">Loading... Please Wait.</div> -->
    <div id="container" class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url() ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><img src="<?php echo base_url() ?>assets/kecil.png"></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><img src="<?php echo base_url() ?>assets/kecil.png"> <img src="<?php echo base_url() ?>assets/karin.png" height="50px"></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" title="Sidebar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li>
                <a >
                  <span class="hidden-xs">
                    <?php
                      setlocale(LC_ALL,'IND');
                      echo strftime("%A, ");
                      echo date('d ');
                      echo strftime("%B");
                      echo date(' Y');
                  ?>
                </span>
                </a>
              </li>
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url() ?>assets/dist/img/user2.png" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo $nama ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url() ?>assets/dist/img/user2.png" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $nama ?>
                      <small><?php echo '(' . $username . ')' ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <!-- <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div> -->
                    <div class="pull-right">
                      <a href="<?php echo base_url() ?>auth/doLogout" class="btn btn-default btn-flat">Keluar <i class="fa fa-sign-out"></i></a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar" title="Gusar? Klik tombol ini untuk bantuan"><i class="fa fa-question fa-lg"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>        
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" >
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <li>
              <a href="<?php echo base_url() ?>dashboard">
                <i class="fa fa-home"></i> <span>Home</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-file-text text-yellow"></i>
                <span>Hard Komplain</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url() ?>komplain"><i class="fa fa-plus-square"></i>Tambah Komplain</a></li>
                <li><a href="<?php echo base_url() ?>komplain/showAllKomplain/4"><i class="fa fa-table"></i>Lihat semua</a></li>
              </ul>
            </li>
            <li>
              <a href="<?php echo base_url() ?>dashboard">
                <i class="fa fa-exclamation text-red"></i> <span>Layanan Plasa</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="#"><i class="fa fa-table"></i>Tambah Komplain Plasa <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                      <li><a href="<?php echo base_url() ?>komplain/komplain_plasa_psb"><i class="fa fa-circle-o"></i>PSB</a></li>
                      <li><a href="<?php echo base_url() ?>komplain/komplain_plasa_gangguan"><i class="fa fa-circle-o"></i>Gangguan</a></li>
                  </ul>
                </li>
                <li><a href="<?php echo base_url() ?>janji"><i class="fa fa-exclamation-circle"></i>Lihat semua janji</a></li>
              </ul>
            </li>
            <?php if($jabatan == "Admin"){ ?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-group text-aqua"></i>
                <span>Manajemen User</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url() ?>users"><i class="fa fa-plus-square"></i>Tambah Akun</a></li>
                <li><a href="<?php echo base_url() ?>users/showlist"><i class="fa fa-table"></i>Lihat semua</a></li>
              </ul>
            </li>
            <?php } ?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-phone-square text-aqua"></i>
                <span>Media</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url() ?>media/tambah"><i class="fa fa-plus-square"></i>Tambah Media</a></li>
                <li><a href="<?php echo base_url() ?>media"><i class="fa fa-table"></i>Lihat semua</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-gear text-aqua"></i>
                <span>Layanan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url() ?>layanan/tambah"><i class="fa fa-plus-square"></i>Tambah Layanan</a></li>
                <li><a href="<?php echo base_url() ?>layanan"><i class="fa fa-table"></i>Lihat semua</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-list text-aqua"></i>
                <span>Jenis Komplain</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url() ?>jenis_komplain/tambah"><i class="fa fa-plus-square"></i>Tambah Jenis Komplain</a></li>
                <li><a href="<?php echo base_url() ?>jenis_komplain"><i class="fa fa-table"></i>Lihat semua</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th text-aqua"></i>
                <span>Lainnya</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url() ?>user_manual"><i class="fa fa-question-circle"></i>User Manual</a></li>
                <li><a href="#" data-toggle="modal" data-target="#dinar"><i class="fa fa-info-circle"></i>Profil Developer</a></li>
              </ul>
            </li>
          </ul>
        </section>
      </aside>
      <!-- MODAL -->
      <div class="modal fade" id="dinar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Anggota Kerja Praktik<br/>Teknik Informatika ITS 2015</h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-xs-6">
                  <p style="text-align:center;">
                    <img src="<?php echo base_url() ?>assets/dist/img/dinar.jpg" alt="User Image" style="border-radius:50%;max-width:100%;height:auto;"/>
                    <a class="users-list-name" href="#">Dinar Winia Mahandhira</a>
                    <span class="users-list-date">5112100002</span>
                    <span class="users-list-date"><a href="mailto:dinar.mahandhira@gmail.com" target="_blank">dinar.mahandhira@gmail.com</a></span>
                  </p>

                  <p style="text-align:center;">
                    <img src="<?php echo base_url() ?>assets/dist/img/ratih.jpg" alt="User Image" style="border-radius:50%;max-width:100%;height:auto;"/>
                    <a class="users-list-name" href="#">Ratih Ayu Indraswari</a>
                    <span class="users-list-date">5112100122</span>
                    <span class="users-list-date"><a href="mailto:ratihayuratih@gmail.com" target="_blank">ratihayuratih@gmail.com</a></span>            
                  </p>
                </div>

                <div class="col-xs-6">

                  <p style="text-align:center;">
                    <img src="<?php echo base_url() ?>assets/dist/img/fariz2.jpg" alt="User Image" style="border-radius:50%;max-width:100%;height:auto;"/>
                    <a class="users-list-name" href="#">Fariz Aulia Pradipta</a>
                    <span class="users-list-date">5112100021</span>
                    <span class="users-list-date"><a href="mailto:farizauliapradipta@gmail.com" target="_blank">farizauliapradipta@gmail.com</a></span>
                  </p>

                  <p style="text-align:center;">
                    <img src="<?php echo base_url() ?>assets/dist/img/azis.jpg" alt="User Image" style="border-radius:50%;max-width:100%;height:auto;"/>
                    <a class="users-list-name" href="#">Azis Arijaya</a>
                    <span class="users-list-date">5112100155</span>
                    <span class="users-list-date"><a href="mailto:azis.arijaya@gmail.com" target="_blank">azis.arijaya@gmail.com</a></span>
                  </p>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Control Sidebar -->      
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane active" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading" style="margin-top:0px;margin-bottom:0px;">Bantuan</h3>
            <ul class='control-sidebar-menu'>
              <li>
                <a href= '<?php if (current_url() != base_url() . 'user_manual'){echo base_url() . 'user_manual';} ?>#tambahHardKomplain'>
                  <i class="menu-icon fa fa-plus bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Menambah Hard Komplain Baru</h4>
                  </div>
                </a>
              </li>
              <li>
                <a href='<?php if (current_url() != base_url() . 'user_manual'){echo base_url() . 'user_manual';} ?>#tambahKomplainPlasa'>
                  <i class="menu-icon fa fa-user-plus bg-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Menambah Komplain Plasa Baru</h4>
                  </div>
                </a>
              </li>
              <li>
                <a href='<?php if (current_url() != base_url() . 'user_manual'){echo base_url() . 'user_manual';} ?>#lihatKomplain'>
                  <i class="menu-icon fa fa-list bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Melihat Daftar Komplain</h4>
                  </div>
                </a>
              </li>
              <li>
                <a href='<?php if (current_url() != base_url() . 'user_manual'){echo base_url() . 'user_manual';} ?>#lihatJanji'>
                  <i class="menu-icon fa fa-check-square-o bg-orange"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Melihat Janji dengan Customer</h4>
                  </div>
                </a>
              </li>
              <li>
                <a href='<?php if (current_url() != base_url() . 'user_manual'){echo base_url() . 'user_manual';} ?>#tambahMedia'>
                  <i class="menu-icon fa fa-phone-square bg-maroon"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Menambahkan Media Baru</h4>
                  </div>
                </a>
              </li>
              <li>
                <a href='<?php if (current_url() != base_url() . 'user_manual'){echo base_url() . 'user_manual';} ?>#tambahLayanan'>
                  <i class="menu-icon fa fa-gear bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Menambahkan Layanan Baru</h4>
                  </div>
                </a>
              </li>
              <li>
                <a href='<?php if (current_url() != base_url() . 'user_manual'){echo base_url() . 'user_manual';} ?>#tambahJenisKomplain'>
                  <i class="menu-icon fa fa-server bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Menambahkan Jenis Komplain Baru</h4>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->        

          </div><!-- /.tab-pane -->
        </div>
      </aside>
      <div class='control-sidebar-bg'></div>