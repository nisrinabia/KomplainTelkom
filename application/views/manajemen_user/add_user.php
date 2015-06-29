<script type="text/javascript">
function checkNull()
{
  if(document.getElementById("nama").value == "")
  {
      alert("Nama Lengkap tidak boleh kosong. Silahkan isi kembali");
      document.getElementById("nama").focus();
      return false;
  }
  else
  {
      if(document.getElementById("username").value == "")
      {
          alert("Username tidak boleh kosong. Silahkan isi kembali");
          document.getElementById("username").focus();
          return false;
      }
      else
      {
          if(document.getElementById("pass").value == "")
          {
              alert("Password tidak boleh kosong. Silahkan isi kembali");
              document.getElementById("pass").focus();
              return false;
          }
          else
          {
              return true;
          }    
      }
  }
}
</script>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manajemen User
            <small>Tambah Akun Baru</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i> Manajemen User</a></li>
            <li class="active">Tambah Akun</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12" >

              <div class="box box-danger">
                <div class="box-header">
                  <h3 class="box-title">Informasi Akun Baru</h3>
                </div>
                <form action="<?php echo site_url('users/add'); ?>" method="post">
                <div class="box-body">
                  <div class="form-group">
                    <label>Nama Lengkap :</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                      </div>
                      <input id="nama" class="form-control" name="nama" placeholder="Nama Lengkap"/>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->

                  <div class="form-group">
                    <label>Username :</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-at"></i>
                      </div>
                      <input id="username" class="form-control" name="username" placeholder="Username"/>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->

                  <div class="form-group">
                    <label>Password :</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-lock"></i>
                      </div>
                      <input type="password" id="pass" class="form-control" name="pass" placeholder="Password"/>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->

                  <div class="form-group">
                  	<label>Tipe akun :</label><br/>
                    <label>
                      <input type="radio" name="jabatan" class="flat-red" value="User" checked/> User
                    </label><br/>
                    <label>
                      <input type="radio" name="jabatan" class="flat-red" value="Admin"/> Admin
                    </label>
                  </div>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" style="float:right" onclick="return checkNull()">Tambah</button>
                  </div>
                </form>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (right) -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      