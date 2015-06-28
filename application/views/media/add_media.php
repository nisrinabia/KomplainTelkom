<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Media
            <small>Tambah Media</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Media</li>
            <li class="active">Tambah Media</li>
          </ol>
        </section>

<!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <!-- form start -->
                <form action="<?php echo site_url('media/add'); ?>" method="post" onsubmit="return checkNull()">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="namamedia">Nama Media</label>
                      <input class="form-control" id="namamedia" name="namamedia">
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                  </div>
                </form>
              </div><!-- /.box -->
            </div><!--/.col (left) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
  </div> <!-- /.content-wrapper-->

<script type="text/javascript">
function checkNull()
{
  var asek = document.getElementById("namamedia").value;
  if(asek === null)
  {
    alert(ohno);
    return FALSE;
  }
  else
  {
    return TRUE;
  }
}
</script>