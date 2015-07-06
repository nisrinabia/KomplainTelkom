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
            <small>Edit Jenis Komplain</small>
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-list"></i> Jenis Komplain</li>
            <li><a href="<?php echo base_url() ?>jenis_komplain">Daftar jenis komplain</a></li>
            <li class="active">Edit jenis komplain</li>
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
                  <h3 class="box-title">Edit Informasi Jenis Komplain</h3>
                </div>
                <!-- form start -->
                <?php
                if($result != NULL)
                {
                    foreach($result as $row)
                    { ?>
		                <form action="<?php echo site_url('jenis_komplain/update') . '/' . $row['JENIS_KOMPLAIN'] ?>" method="post">
		                  <div class="box-body">
		                    <div class="form-group">
		                      <label for="jeniskomplain">Jenis Komplain</label>
		                      <input class="form-control" id="jeniskomplain" name="jeniskomplain" value="<?php echo $row['JENIS_KOMPLAIN'] ?>">
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