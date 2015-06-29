<script type="text/javascript">
function checkNull()
{
  var asek = document.getElementById("namamedia").value;
  if(asek == "")
  {
    alert("Nama media tidak boleh kosong. Silahkan isi kembali");
    document.getElementById("namamedia").focus();
    return false;
  }
  else
  {
    return true;
  }
}
</script>

<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Media
            <small>Tambah Media</small>
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-phone-square"></i> Media</li>
            <li class="active">Tambah Media</li>
          </ol>
        </section>

<!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-danger">
                <div class="box-header">
                  <h3 class="box-title">Informasi Media Baru</h3>
                </div>
                <!-- form start -->
                <form action="<?php echo site_url('media/add'); ?>" method="post">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="namamedia">Nama Media</label>
                      <input class="form-control" id="namamedia" name="namamedia">
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" style="float:right" onclick="return checkNull()">Tambahkan</button>
                  </div>
                </form>
              </div><!-- /.box -->
            </div><!--/.col (left) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
  </div> <!-- /.content-wrapper-->