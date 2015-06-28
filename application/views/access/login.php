<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Sistem Informasi Pengaduan Telkom Malang</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?=base_url('assets/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?=base_url('assets/bootstrap/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?=base_url('assets/dist/css/AdminLTE.min.css');?>" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?=base_url('assets/plugins/iCheck/square/blue.css');?>" rel="stylesheet" type="text/css" />
 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body class="login-page">

    <div class="login-logo">
        <a href="<?=base_url();?>"><b>Sistem Informasi Pengaduan</b> Telkom Malang</a>
    </div><!-- /.login-logo -->

    <div class="login-box">
  
      <div class="login-box-body">
        <p class="login-box-msg">Masukkan username dan password</p>
        <?php if ($error)
            {
              echo '<div class="alert alert-danger">Username dan/atau password salah<button class="close" data-dismiss="alert" type="button">×</button>','</div>';
            }
        ?>
          <form action="<?php echo site_url('auth/doLogin'); ?>" class="mainForm" method="post">
          <div class="form-group has-feedback">
              <input type="text" name="username" 
                     class="form-control" placeholder="Username" autofocus="" value=""/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
              <input type="password" name="password" 
                     class="form-control" placeholder="Password" value=""/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          
          <div class="row">
              <div class="col-xs-12">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
              </div><!-- /.col -->
          </div>
          </form>
        <!-- <a href="#">I forgot my password</a><br> -->
        <div class="social-auth-links text-center">
          <p>Kerja Praktik ITS Telkom Malang &copy; 2015
              <br>
             Versi 1.0.0 
          </p>
        </div><!-- /.social-auth-links -->
      </div><!-- /.login-box-body -->
      
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src="<?=base_url('assets/plugins/jQuery/jQuery-2.1.3.min.js');?>"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?=base_url('assets/bootstrap/js/bootstrap.min.js');?>" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?=base_url('assets/plugins/iCheck/icheck.min.js');?>" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
  
</html>