<script type="text/javascript">
function checkNull()
{
  var asek = document.getElementById("jeniskomplain").value;
  if(asek == "")
  {
    alert("Isian jenis komplain tidak boleh kosong. Silahkan isi kembali");
    document.getElementById("jeniskomplain").focus();
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
            Jenis Komplain
            <small>Tambah Jenis Komplain</small>
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-list"></i> Jenis Komplain</li>
            <li class="active">Tambah jenis komplain</li>
          </ol>
        </section>

<!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-danger">
                <!-- form start -->
                <div class="box-header">
                  <h3 class="box-title">Informasi Jenis Komplain Baru</h3>
                </div>
                <form action="<?php echo site_url('jenis_komplain/add'); ?>" method="post">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="jeniskomplain">Jenis komplain</label>
                      <input class="form-control" id="jeniskomplain" name="jeniskomplain">
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" onclick="return checkNull()" style="float:right">Tambahkan</button>
                  </div>
                </form>
              </div><!-- /.box -->
            </div><!--/.col (left) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
  </div> <!-- /.content-wrapper-->