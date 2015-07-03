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
            <small>Edit Media</small>
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-phone-square"></i> Media</li>
            <li><a href="<?php echo base_url() ?>media">Daftar Media</a></li>
            <li class="active">Edit Media</li>
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
                  <h3 class="box-title">Edit Informasi Media</h3>
                </div>
                <!-- form start -->
                <?php
                if($result != NULL)
                {
                    foreach($result as $row)
                    { ?>
		                <form action="<?php echo site_url('media/update') . '/' . $row['NAMA_MEDIA'] ?>" method="post">
		                  <div class="box-body">
		                    <div class="form-group">
		                      <label for="namamedia">Nama Media</label>
		                      <input class="form-control" id="namamedia" name="namamedia" value="<?php echo $row['NAMA_MEDIA'] ?>">
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