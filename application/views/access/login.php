<script type="text/javascript">
function checkNull()
{
  var user_check = document.getElementById("username").value;
  var pass_check = document.getElementById("password").value;
  if(user_check == "")
  {
    alert("Username tidak boleh kosong. Silahkan isi kembali");
    document.getElementById("username").focus();
    return false;
  }
  else if (pass_check == "") 
  {
    alert("Password tidak boleh kosong. Silahkan isi kembali");
    document.getElementById("password").focus();
    return false;
  }
  else 
  {
    return true;
  }
}
</script>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>CASSANDRA</title>
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

  <body style="background-image:url('<?php echo base_url() ?>assets/dist/img/loginhahaha.jpg');background-size: cover;background-position: left;" class="login-page">

    <!-- <div class="login-logo" style="padding-top: 50px !important;">
        <a href="<?=base_url();?>" style="color:#ffffff;text-shadow: 2px 2px 4px #000000;"><b>CASSANDRA</b><br style="margin-top: 0px !important;"><small><small><small>(Customer Handling Arrangement)</small></small></small></a>
    </div> --><!-- /.login-logo -->

    <div class="login-box" style="padding-top: 50px !important;">
  
      <div class="login-box-body" style=" background-color: #DD4B39 !important; color: white !important; ">
        <h1 align="center"><b>CASSANDRA</b></h1>
        <p class="login-box-msg" style="padding-top: 0px !important; margin-top: 0px !important;">Customer Handling Arrangement</p>
        <hr>
        <?php if ($error)
            {
              echo '<div class="alert alert-danger">Username dan/atau password salah<button class="close" data-dismiss="alert" type="button">×</button>','</div>';
            }
        ?>
          <form action="<?php echo site_url('auth/doLogin'); ?>" class="mainForm" method="post">
          <div class="form-group has-feedback">
              <input type="text" name="username" id="username" 
                     class="form-control" placeholder="Username" autofocus="" value=""/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
              <input type="password" name="password" id="password" 
                     class="form-control" placeholder="Password" value=""/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          
          <?php
          if(!empty($ref) || $ref != '')
          {
            echo '<input type="hidden" name="ref" value="'.$ref.'">';
          }
          ?>

          <div class="row">
              <div class="col-xs-12">
                  <button type="submit" class="btn btn-primary btn-block btn-flat" onclick="return checkNull()">Masuk</button>
              </div><!-- /.col -->
          </div>
          </form>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
        <!-- <a href="#">I forgot my password</a><br> -->
        <div class="social-auth-links text-center">
          <a href="#" data-toggle="modal" data-target="#myModal" style="color: white !important;"><p><b>Kerja Praktik ITS Telkom Malang</b></a> &copy; 2015
              <br>
             Version 1.0
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