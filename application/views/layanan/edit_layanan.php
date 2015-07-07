<script type="text/javascript">
function checkNull()
{
  var asek = document.getElementById("namalayanan").value;
  if(asek == "")
  {
    alert("Nama layanan tidak boleh kosong. Silahkan isi kembali");
    document.getElementById("namalayanan").focus();
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
            Layanan
            <small>Edit Layanan</small>
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-gear"></i> Layanan</li>
            <li><a href="<?php echo base_url() ?>layanan">Daftar Layanan</a></li>
            <li class="active">Edit Layanan</li>
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
                  <h3 class="box-title">Edit Informasi Layanan</h3>
                </div>
                <!-- form start -->
                <?php
                if($result != NULL)
                {
                    foreach($result as $row)
                    { ?>
		                <form action="<?php echo site_url('layanan/update') . '/' . $row['NAMA_LAYANAN'] ?>" method="post">
		                  <div class="box-body">
		                    <div class="form-group">
		                      <label for="namalayanan">Nama Layanan</label>
		                      <input class="form-control" id="namalayanan" name="namalayanan" value="<?php echo $row['NAMA_LAYANAN'] ?>">
		                    </div>
		                  </div><!-- /.box-body -->

		                  <div class="box-footer">
		                    <button type="submit" class="btn btn-primary" style="float:right" onclick="return checkNull()">Update</button>
		                  </div>
		                </form>
                <?php 
                	}
                } ?>
              </div><!-- /.box -->
            </div><!--/.col (left) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
  </div> <!-- /.content-wrapper-->