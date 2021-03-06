<script type="text/javascript">
  function checkNull()
  {
    var nama = document.getElementById("nama").value;
    var alamat = document.getElementById("alamat").value;
    var pic = document.getElementById("pic").value;
    var dp1 = document.getElementById("dp1").value;
    var nopots = document.getElementById("nopots").value;
    if (nopots == "") 
    {
      alert("Isian Nama Pelapor tidak boleh kosong. Silahkan isi kembali");
      document.getElementById("nopots").focus();
      return false;
    }
    else if (nama == "") 
    {
      alert("Isian Nama Pelapor tidak boleh kosong. Silahkan isi kembali");
      document.getElementById("nama").focus();
      return false;
    }
    else if (alamat == "") 
    {
      alert("Isian Alamat Pelapor tidak boleh kosong. Silahkan isi kembali");
      document.getElementById("alamat").focus();
      return false;
    }
    else if (pic == "") 
    {
      alert("Isian Nomor Telepon Pelapor tidak boleh kosong. Silahkan isi kembali");
      document.getElementById("pic").focus();
      return false;
    }
    else if (dp1 == "") 
    {
      alert("Isian Tanggal Close tidak boleh kosong. Silahkan isi kembali");
      //document.getElementById("tglclosed").focus();
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
            Layanan Plasa
            <small>Tambah Komplain Gangguan</small>
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-file-text text-yellow"></i>  <a href="#">Layanan plasa</a></li>
            <li>Tambah komplain plasa</li>
            <li class="active">Gangguan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <!-- general form elements disabled -->
              <div class="box box-warning">
                <div class="box-header">
                  <h3 class="box-title">Data Komplain</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <p><span class="error"><b>*Isian harus diisi</b></span></p>
                  <form action="<?php echo site_url('Komplain/addKomplain'); ?>" method="post" role="form">
                    <div class="form-group">
                      <label>Nomor POTS <span class="error">*</span></label>
                      <input name="nopots" id="nopots" type="text" class="form-control" placeholder="Nomor POTS" autofocus=""/>
                    </div>
                    <div class="form-group">
                      <label>Nomor Internet</label>
                      <input name="noinet" type="text" class="form-control" placeholder="12 Digit Nomor Internet"/>
                    </div>
                    <div class="form-group">
                      <label>Nama Pelapor <span class="error">*</span></label>
                      <input name="nama" id="nama" type="text" class="form-control" placeholder="Nama Lengkap"/>
                    </div>
                    <div class="form-group">
                      <label>Alamat Pelapor <span class="error">*</span></label>
                      <input name="alamat" id="alamat" type="text" class="form-control" placeholder="Alamat Lengkap"/>
                    </div>
                    <div class="form-group">
                      <label>Nomor Telepon Pelapor <span class="error">*</span></label>
                      <input name="pic" id="pic" type="text" class="form-control" placeholder="Nomor Telepon Pelapor"/>
                    </div>

                  <!-- select -->
                    <div class="form-group">
                      <label>Layanan <span class="error">*</span></label>
                      <select name="namalayanan" class="form-control">
                        <?php
                        foreach ($nama_layanan as $row)
                        {
                          echo '<option value="'.$row->NAMA_LAYANAN.'">'.$row->NAMA_LAYANAN.'</option>';
                        }
                        ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Jenis Komplain <span class="error">*</span></label>
                      <select name="jeniskomplain" class="form-control">
                        <?php
                        foreach ($jenis_komplain as $row)
                        {
                          echo '<option  value="'.$row->JENIS.'">'.$row->JENIS.'</option>';
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
                      <label>Status Komplain <span class="error">*</span></label>
                      <select name="statuskomplain" class="form-control">
                        <option value="In Progress">In Progress</option>
                        <option value="Closed">Closed</option>
                        <option value="Decline">Decline</option>
                      </select>
                    </div>

                  <div class="form-group">
                    <label>Tanggal Closed (mm-dd-yyyy) <span class="error">*</span></label>
                        <!-- <input type="date" name="tglclosed"/> -->
                        <input type="text" class="form-control" name="tglclosed" value="" id="dp1" >
                  </div><!-- /.form group -->

                  <input type="hidden" name="status" id="status" value="">
                  <div class="form-group">
                    <label>Tanggal Janji (mm-dd-yyyy HH:MM)</label>

                        <div id="noJanji" style="display:block; ">
                          <div class="row">
                            <div class="col-xs-2">
                              <button class="btn btn-block btn-primary btn-sm" type="button" class="btn btn-primary" value="Edit" onClick="showJanji()">Tambah Waktu Janji</button>
                            </div>
                          </div>
                        </div>

                        <div id="janji" style="display:none; ">
                          <input type="text" class="form-control" id="datetimepicker12" name="deadline"/>
                          <div class="row">
                            <div class="col-xs-2">
                              <button class="btn btn-block btn-primary btn-sm" type="button" style="margin-top:5px;" class="btn btn-primary" value="Batal" onClick="hideJanji()">Batal</button>
                            </div>
                          </div>
                        </div>
                  </div>

                  <div class="form-group">
                      <label>Keterangan Tambahan</label>
                      <textarea name="ket" class="form-control" rows="3" placeholder="Solusi Yang Ditawarkan"></textarea>
                    </div>

                    <input type="hidden" name="namamedia" value="Plasa"/>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" onclick="return checkNull()">Tambah Komplain</button>
                  </div>
                  </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    