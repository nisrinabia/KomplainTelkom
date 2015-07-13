<script type="text/javascript">
function checkNullWithoutPOTS()
{
  var nama = document.getElementById("nama").value;
  var alamat = document.getElementById("alamat").value;
  var pic = document.getElementById("pic").value;
  var dp1 = document.getElementById("datetimepicker12").value;
  if (nama == "") 
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

function checkNullWithPOTS()
{
  var nopots = document.getElementById("nopots").value;
  var nama = document.getElementById("nama").value;
  var alamat = document.getElementById("alamat").value;
  var pic = document.getElementById("pic").value;
  var dp1 = document.getElementById("datetimepicker12").value;
  if (nama == "") 
  {
    alert("Isian Nama Pelapor tidak boleh kosong. Silahkan isi kembali");
    document.getElementById("nama").focus();
    return false;
  }
  else if (nopots == "") 
  {
    alert("Isian Nomor POTS tidak boleh kosong. Silahkan isi kembali");
    document.getElementById("nopots").focus();
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
            Komplain
            <small>Edit Komplain</small>
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-file-text text-yellow"></i>  <a href="#">Komplain</a></li>
            <li class="active">Edit Komplain</li>
          </ol>
        </section>
        <?php
          foreach ($makan as $row) {
                          $id            = $row['ID_KOMPLAIN'];
                          $nopots         = $row['NO_POTS'];
                          $noinet         = $row['NO_INTERNET'];
                          $nama           = $row['NAMA_PELAPOR'];
                          $alamat         = $row['ALAMAT_PELAPOR'];
                          $pic            = $row['PIC_PELAPOR'];
                          $namamedia      = $row['NAMA_MEDIA'];
                          $namalayanan    = $row['NAMA_LAYANAN'];
                          $jeniskomplain  = $row['JENIS_KOMPLAIN'];
                          $tglclosed      = $row['TGL_CLOSE'];
                          $keluhan        = $row['KELUHAN'];
                          $solusi         = $row['SOLUSI'];
                          $statuskomplain = $row['STATUS_KOMPLAIN'];
                          $ket            = $row['KETERANGAN'];
                          $deadline       = $row['DEADLINE'];
                       }
        ?>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <!-- general form elements disabled -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Data Komplain</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                      <form action="<?php echo site_url('Komplain/updateKomplain'); ?>" method="post" role="form">
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <div class="form-group">
                          <label>Nomor POTS</label>
                          <input name="nopots" type="text" id="nopots" class="form-control" placeholder="Nomor POTS" value="<?php echo $nopots ?>" />
                        </div>
                        <div class="form-group">
                          <label>Nomor Internet (opsional)</label>
                          <input name="noinet" type="text" id="noinet" class="form-control" placeholder="12 Digit Nomor Internet" value="<?php echo $noinet ?>"/>
                        </div>
                        <div class="form-group">
                          <label>Nama Pelapor</label>
                          <input name="nama" type="text" id="nama" class="form-control" placeholder="Nama Lengkap" value="<?php echo $nama ?>"/>
                        </div>
                        <div class="form-group">
                          <label>Alamat Pelapor</label>
                          <input name="alamat" type="text" id="alamat" class="form-control" placeholder="Alamat Lengkap" value="<?php echo $alamat ?>"/>
                        </div>
                        <div class="form-group">
                          <label>Nomor Telepon Pelapor</label>
                          <input name="pic" id="pic" type="text" class="form-control" placeholder="Nomor Telepon Pelapor" value="<?php echo $pic ?>"/>
                        </div>

                      <!-- select -->
                        <div class="form-group">
                          <label>Media</label>
                          <select name="namamedia" id="namamedia" class="form-control">
                            <?php
                            
                            foreach ($nama_media as $row) {
                              if ($namamedia == $row->NAMA_MEDIA){
                                echo '<option value="' . $row->NAMA_MEDIA . '" selected >' .$row->NAMA_MEDIA.'</option>';
                              }
                              else{
                                echo '<option value="' . $row->NAMA_MEDIA . '">' .$row->NAMA_MEDIA.'</option>';
                              }
                              
                            }
                            ?>
                          </select>
                        </div>

                        <div class="form-group">
                          <label>Layanan</label>
                          <select name="namalayanan" id="namalayanan" class="form-control">
                            <?php
                            foreach ($nama_layanan as $row) {
                              if ($namalayanan == $row->NAMA_LAYANAN){
                                echo '<option value="' . $row->NAMA_LAYANAN . '" selected >' .$row->NAMA_LAYANAN.'</option>';
                              }
                              else{
                                echo '<option value="' . $row->NAMA_LAYANAN . '">' .$row->NAMA_LAYANAN.'</option>';
                              }
                            }
                            ?>
                          </select>
                        </div>

                        <div class="form-group">
                          <label>Jenis Komplain</label>
                          <select name="jeniskomplain" id="jeniskomplain" class="form-control">
                            <?php
                            foreach ($jenis_komplain as $row) {
                              if ($jeniskomplain == $row->JENIS){
                                echo '<option value="' . $row->JENIS . '" selected >' .$row->JENIS.'</option>';
                              }
                              else{
                                echo '<option value="' . $row->JENIS . '">' .$row->JENIS.'</option>';
                              }
                            }
                            ?>
                          </select>
                        </div>

                        <!-- textarea -->
                        <div class="form-group">
                          <label>Keluhan</label>
                          <textarea name="keluhan" id="keluhan" class="form-control" rows="3" placeholder="Deskripsi Keluhan"><?php echo $keluhan;?></textarea>
                        </div>
                        <div class="form-group">
                          <label>Solusi</label>
                          <textarea name="solusi" id="solusi" class="form-control" rows="3" placeholder="Solusi Yang Ditawarkan"><?php echo $solusi;?></textarea>
                        </div>

                        <div class="form-group">
                          <label>Status Komplain</label>
                          <?php
                            //wecho $statuskomplain;
                          ?>
                          <select name="statuskomplain" class="form-control"/>
                            <option value="In Progress" <?php if($statuskomplain == 'In Progress'){ echo 'selected'; } ?> >In Progress</option>';
                            <option value="Closed" <?php if($statuskomplain == 'Closed'){ echo 'selected'; } ?> >Closed</option>';
                            <option value="Decline" <?php if($statuskomplain == 'Decline'){ echo 'selected'; } ?> >Decline</option>';
                          </select>
                        </div>

                      <div class="form-group">
                        <label>Tanggal Closed</label>
                            <!-- <input type="date" name="tglclosed"/> -->
                            <?php foreach ($close as $tanggal) { ?>
                            <input type="text" class="form-control" id="dp1" name="tglclosed" value="<?php echo $tanggal['TANGGAL_CLOSED'] ?>" />
                            <?php } ?>
                      </div><!-- /.form group -->

                      <div id="awal" style="display:block;">
                          <div class="form-group">
                              <label>Tanggal Janji</label>
                              <?php
                              if ($deadline == '0000-00-00 00:00:00' || $deadline == NULL)
                              {
                                echo '<br>Tidak ada janji';
                                echo '
                                <div class="row">
                                  <div class="col-xs-2">
                                    <button class="btn btn-block btn-primary btn-sm" style="margin-top:5px;" type="button" class="btn btn-primary" value="Edit" onClick="edit_tanggal()">Tambah tanggal janji</button>
                                  </div>
                                </div>';
                              }
                              else
                              {
                                echo '<input type="text" class="form-control" name="deadlinelama" value="'.$deadline.'" disabled/>';
                                echo '
                                <div class="row">
                                  <div class="col-xs-2">
                                    <button class="btn btn-block btn-primary btn-sm" style="margin-top:5px;" type="button" class="btn btn-primary" value="Edit" onClick="edit_tanggal()">Edit tanggal janji</button>
                                  </div>
                                </div>';
                              } 
                              ?>
                            </div>
                      </div>
                      <input type="hidden" name = "status" value="lama" id="status">
                      <div id="editkan" style="display:none;">
                          <div class="form-group">
                            <label>Tanggal Janji</label>
                              <input type="text" class="form-control" id="datetimepicker12" name="deadlinebaru" value="<?php echo $deadline?>"/>
                                <div class="row">
                                  <div class="col-xs-2">
                                      <button class="btn btn-block btn-primary btn-sm" style="margin-top:5px;" type="button" class="btn btn-primary" value="Batal" onClick="batal()">Batal</button>
                                  </div>
                                </div>
                            </div>
                        </div>
                      <!-- <div class="form-group">
                        <label>Tanggal Janji</label>
                          <div class="col-md-12">
                            <input type="text" class="form-control" id="datetimepicker12" name="deadline" value="<?php echo $deadline?>"/>
                          </div>
                      </div> -->

                      <div class="form-group">
                        <label>Keterangan Tambahan</label>
                        <textarea name="ket" id="ket" class="form-control" rows="3" placeholder="Keterangan"><?php echo $ket;?></textarea>
                      </div>

                      <div class="box-footer">
                        <?php
                        if ($nopots == NULL || $nopots == '')
                        {
                          echo '<button type="submit" class="btn btn-primary" onclick="return checkNullWithoutPOTS()">Ubah komplain (without pots)</button>';
                        }
                        else
                        {
                          echo '<button type="submit" class="btn btn-primary" onclick="return checkNullWithPOTS()">Ubah komplain (with pots)</button>';
                        }
                        ?>
                       </div>
                      </form>
                    </div> <!-- /.col -->
                  </div> <!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div> <!-- /.col -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->    