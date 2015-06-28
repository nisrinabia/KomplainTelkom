<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Media
            <small>Edit Media</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Media</li>
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
              <div class="box box-primary">
                <!-- form start -->
                <?php
                if($result != NULL)
                {
                    foreach($result as $row)
                    { ?>
		                <form action="<?php echo site_url('media/update') . '/' . $row['ID_MEDIA'] ?>" method="post">
		                  <div class="box-body">
		                    <div class="form-group">
		                      <label for="namamedia">Nama Media</label>
		                      <input class="form-control" id="namamedia" name="namamedia" value="<?php echo $row['NAMA_MEDIA'] ?>">
		                    </div>
		                  </div><!-- /.box-body -->

		                  <div class="box-footer">
		                    <button type="submit" class="btn btn-primary">Update</button>
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