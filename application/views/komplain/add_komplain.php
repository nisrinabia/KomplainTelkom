      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Komplain
            <small>Tambah Komplain</small>
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-file-text text-yellow"></i>  <a href="#">Komplain</a></li>
            <li class="active">Tambah Komplain</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <!-- right column -->
            <div class="col-md-6">
              <!-- general form elements disabled -->
              <div class="box box-warning">
                <div class="box-header">
                  <h3 class="box-title">Data Komplain</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form action="<?php echo site_url('Komplain/addKomplain'); ?>" method="post" role="form">
                    <div class="form-group">
                      <label>Nomor POTS</label>
                      <input name="nopots" type="text" class="form-control" placeholder="Nomor POTS"/>
                    </div>
                    <div class="form-group">
                      <label>Nama Pelapor</label>
                      <input name="nama" type="text" class="form-control" placeholder="Nama Lengkap"/>
                    </div>
                    <div class="form-group">
                      <label>Alamat Pelapor</label>
                      <input name="alamat" type="text" class="form-control" placeholder="Alamat Lengkap"/>
                    </div>
                    <div class="form-group">
                      <label>Nomor Internet (opsional)</label>
                      <input name="noinet" type="text" class="form-control" placeholder="12 Digit Nomor Internet"/>
                    </div>

                  <!-- select -->
                    <div class="form-group">
                      <label>Media</label>
                      <select name="namamedia" class="form-control">
                        <?php
                        foreach ($nama_media as $row) {
                          echo '<option value="' . $row->NAMA_MEDIA . '">' .$row->NAMA_MEDIA.'</option>';
                        }
                        ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Layanan</label>
                      <select name="namalayanan" class="form-control">
                        <?php
                        foreach ($nama_layanan as $row) {
                          echo '<option value="'.$row->NAMA_LAYANAN.'">'.$row->NAMA_LAYANAN.'</option>';
                        }
                        ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Jenis Komplain</label>
                      <select name="jeniskomplain" class="form-control">
                        <?php
                        foreach ($jenis_komplain as $row) {
                          echo '<option  value="'.$row->JENIS_KOMPLAIN.'">'.$row->JENIS_KOMPLAIN.'</option>';
                        }
                        ?>
                      </select>
                    </div>

                    <!-- textarea -->
                    <div class="form-group">
                      <label>Keluhan</label>
                      <textarea name="keluhan" class="form-control" rows="3" placeholder="Deskripsi Keluhan"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Solusi</label>
                      <textarea name="solusi" class="form-control" rows="3" placeholder="Solusi Yang Ditawarkan"></textarea>
                    </div>

                    <div class="form-group">
                      <label>Status Komplain</label>
                      <select name="statuskomplain" class="form-control">
                        <option value="0">In Progress</option>
                        <option value="1">Closed</option>
                      </select>
                    </div>

                  <div class="form-group">
                    <label>Tanggal Closed</label>
                      <div class="col-md-12">
                        <input type="date" name="tglclosed"/>
                      </div>
                  </div><!-- /.form group -->

                  <div class="form-group">
                    <label>Tanggal Janji</label>
                      <div class="col-md-12">
                        <input type="text" class="form-control pull-right" id="datetimepicker12" name="deadline"/>
                      </div>
                  </div><!-- /.form group -->

                  <div class="form-group">
                      <label>Keterangan Tambahan</label>
                      <textarea name="ket" class="form-control" rows="3" placeholder="Solusi Yang Ditawarkan"></textarea>
                    </div>

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                  </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (right) -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Unggah Data Komplain</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <input type="file" id="exampleInputFile">
                      <p class="help-block">Unggah file dengan format .csv</p>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->
            </div><!--/.col (left) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    