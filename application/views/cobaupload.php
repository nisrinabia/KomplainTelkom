
          </div><!--/.col (right) -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Unggah Data Komplain</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="<?php base_url() ?>komplain/process" method="post" name="upload_excel" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <input type="file" name="file" id="exampleInputFile" class="input-large">
                      <!-- <input type="file" id=""> -->
                      <p class="help-block">Unggah file dengan format .csv</p>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->
            </div><!--/.col (left) -->
    