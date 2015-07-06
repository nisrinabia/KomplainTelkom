<script>
function deldata() {
    return confirm('Apakah Anda yakin akan menghapus data ini?');
  }
</script>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Jenis Komplain
    	<small>Daftar Jenis Komplain</small>
    </h1>
    <ol class="breadcrumb">
      <li><i class="fa fa-list"></i> Jenis Komplain</li>
      <li class="active">Daftar jenis komplain</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        
      	<?php
          $coba = $bulan;
          if($coba == '01')
          {
            $coba = 'Januari';
          }
          elseif($coba == '02')
          {
            $coba = 'Februari';
          }
          elseif($coba == '03')
          {
            $coba = 'Maret';
          }
          elseif($coba == '04')
          {
            $coba = 'April';
          }
          elseif($coba == '05')
          {
            $coba = 'Mei';
          }
          elseif($coba == '06')
          {
            $coba = 'Juni';
          }
          elseif($coba == '07')
          {
            $coba = 'Juli';
          }
          elseif($coba == '08')
          {
            $coba = 'Agustus';
          }
          elseif($coba == '09')
          {
            $coba = 'September';
          }
          elseif($coba == '10')
          {
            $coba = 'Oktober';
          }
          elseif($coba == '11')
          {
            $coba = 'November';
          }
          elseif($coba == '12')
          {
            $coba = 'Desember';
          }
          echo '
          <div class="alert alert-success">
          	<h4>Hasil pencarian</h4>
          		Menampilkan janji pada bulan ' . $coba . ' dan tahun ' . $tahun .'
        	</div>';
        ?>
        <div class="box">
          <div class="box-body">
              <h4>Navigasi</h4><hr>
              <a href="#"><button type="button" class="btn btn-danger">Lihat janji melewati deadline</button></a>
              <a href="#"><button type="button" class="btn btn-warning">Lihat janji mendekati deadline</button></a>
              <a href="#"><button type="button" class="btn btn-success">Lihat janji sebelum deadline</button></a>
              <br><br>
              <h4>Halaman ini &raquo; Daftar semua janji</h4><hr>
              <form method="post" action="<?php base_url() ?>filterall">
              Filter berdasarkan: 
                <select class="option-control" name="bulan" data-toggle="tooltip" data-placement="top" title="Pilih bulan">
                    <option value="01">Januari</option>     
                     <option value="02">Februari</option>
                     <option value="03">Maret</option>
                     <option value="04">April</option>
                     <option value="05">Mei</option>
                     <option value="06">Juni</option>
                     <option value="07">Juli</option>
                     <option value="08">Agustus</option>
                     <option value="09">September</option>
                     <option value="10">Oktober</option>
                     <option value="11">November</option>
                     <option value="12">Desember</option>
                  </select>
                  <select class="option-control" name="tahun" data-toggle="tooltip" data-placement="top" title="Pilih tahun">
                    <option value="2015">2015</option>     
                     <option value="2014">2014</option>
                     <option value="2013">2013</option>
                  </select>  
                  <button type="submit" class="btn btn-success" id="bulan">Pilih</button>
                  <a href="<?php base_url() ?>janji"> <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Menampilkan semua janji yang belum ditangani">Tampilkan semua</button></a>
                </form>
          </div>
        </div>

        <div class="box">
          <div class='box-header with-border'>
              <h3 class='box-title'>Daftar Semua Janji</h3>
            </div>
          <div class="box-body">
          <a href="#"><button type="button" class="btn btn-primary">Unduh file excel</button></a>
          <div class="pull-right" style="vertical-align:top;margin-top:5px;">
          <b style="vertical-align:top;">Keterangan: </b>
          <span class="legend" style="background-color:#F0E582!important"></span>Mendekati deadline (kurang dari sehari)
          <span class="legend" style="background-color:#F6A2A1!important"></span>Melewati deadline
          </div>
           <p></p>
            <table id="example1" class="table table-bordered">
              <thead>
                <tr>
                  <th>AKSI</th>
                  <th>NO. POTS</th>
                  <th>NO. INTERNET</th>
                  <th>NAMA PELAPOR</th>
                  <th>ALAMAT PELAPOR</th>
                  <th>PIC PELAPOR</th>
                  <th>MEDIA</th>
                  <th>LAYANAN</th>
                  <th>JENIS KOMPLAIN</th>
                  <th>TGL KOMPLAIN</th>
                  <th>TGL CLOSE</th>
                  <th>KELUHAN</th>
                  <th>SOLUSI</th>
                  <th>STATUS</th>
                  <th>KETERANGAN</th>
                  <th>DOKUMEN</th>
                  <th>DEADLINE</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if($list != NULL)
                {
                  foreach($list as $row)
                  { 
                    $hour = (int)$row->HOUR;
                    if($hour < 0)
                    {?>
                    <tr>
                      <th style="background-color:#F6A2A1!important">
                        <a href="<?php echo base_url() . 'janji/lihat/' . $row->ID_KOMPLAIN ?>" title="Lihat"><i class="fa fa-eye text-black"></i></a>
                        <a href="<?php echo base_url() . 'janji/edit/' . $row->ID_KOMPLAIN ?>" title="Edit"><i class="fa fa-pencil text-black"></i></a>
                      </th>
                      <th style="background-color:#F6A2A1!important"><?php echo $row->NO_POTS; ?></th>
                      <th style="background-color:#F6A2A1!important"><?php echo $row->NO_INTERNET; ?></th>
                      <th style="background-color:#F6A2A1!important"><?php echo $row->NAMA_PELAPOR; ?></th>
                      <th style="background-color:#F6A2A1!important"><?php echo $row->ALAMAT_PELAPOR; ?></th>
                      <th style="background-color:#F6A2A1!important"><?php echo $row->PIC_PELAPOR; ?></th>
                      <th style="background-color:#F6A2A1!important"><?php echo $row->NAMA_MEDIA; ?></th>
                      <th style="background-color:#F6A2A1!important"><?php echo $row->NAMA_LAYANAN; ?></th>
                      <th style="background-color:#F6A2A1!important"><?php echo $row->JENIS_KOMPLAIN; ?></th>
                      <th style="background-color:#F6A2A1!important"><?php echo $row->TGL_KOMPLAIN; ?></th>
                      <th style="background-color:#F6A2A1!important"><?php echo $row->TGL_CLOSE; ?></th>
                      <th style="background-color:#F6A2A1!important"><?php echo $row->KELUHAN; ?></th>
                      <th style="background-color:#F6A2A1!important"><?php echo $row->SOLUSI; ?></th>
                      <th style="background-color:#F6A2A1!important"><?php echo $row->STATUS_KOMPLAIN; ?></th>
                      <th style="background-color:#F6A2A1!important"><?php echo $row->KETERANGAN; ?></th>
                      <th style="background-color:#F6A2A1!important"><?php echo $row->DOKUMEN; ?></th>
                      <th style="background-color:#F6A2A1!important"><?php echo $row->DEADLINE; ?></th>
                    </tr>
                    <?php
                    }
                    else if($hour > 0 && $hour <24)
                    {?>
                    <tr>
                      <th style="background-color:#F0E582!important">
                        <a href="<?php echo base_url() . 'janji/lihat/' . $row->ID_KOMPLAIN ?>" title="Lihat"><i class="fa fa-eye text-black"></i></a>
                        <a href="<?php echo base_url() . 'janji/edit/' . $row->ID_KOMPLAIN ?>" title="Edit"><i class="fa fa-pencil text-black"></i></a>
                      </th>
                      <th style="background-color:#F0E582!important"><?php echo $row->NO_POTS; ?></th>
                      <th style="background-color:#F0E582!important"><?php echo $row->NO_INTERNET; ?></th>
                      <th style="background-color:#F0E582!important"><?php echo $row->NAMA_PELAPOR; ?></th>
                      <th style="background-color:#F0E582!important"><?php echo $row->ALAMAT_PELAPOR; ?></th>
                      <th style="background-color:#F0E582!important"><?php echo $row->PIC_PELAPOR; ?></th>
                      <th style="background-color:#F0E582!important"><?php echo $row->NAMA_MEDIA; ?></th>
                      <th style="background-color:#F0E582!important"><?php echo $row->NAMA_LAYANAN; ?></th>
                      <th style="background-color:#F0E582!important"><?php echo $row->JENIS_KOMPLAIN; ?></th>
                      <th style="background-color:#F0E582!important"><?php echo $row->TGL_KOMPLAIN; ?></th>
                      <th style="background-color:#F0E582!important"><?php echo $row->TGL_CLOSE; ?></th>
                      <th style="background-color:#F0E582!important"><?php echo $row->KELUHAN; ?></th>
                      <th style="background-color:#F0E582!important"><?php echo $row->SOLUSI; ?></th>
                      <th style="background-color:#F0E582!important"><?php echo $row->STATUS_KOMPLAIN; ?></th>
                      <th style="background-color:#F0E582!important"><?php echo $row->KETERANGAN; ?></th>
                      <th style="background-color:#F0E582!important"><?php echo $row->DOKUMEN; ?></th>
                      <th style="background-color:#F0E582!important"><?php echo $row->DEADLINE; ?></th>
                    </tr>
                    <?php
                    }
                    else if($hour > 24)
                    {?>
                    <tr>
                      <th>
                        <a href="<?php echo base_url() . 'janji/lihat/' . $row->ID_KOMPLAIN ?>" title="Lihat"><i class="fa fa-eye text-aqua"></i></a>
                        <a href="<?php echo base_url() . 'janji/edit/' . $row->ID_KOMPLAIN ?>" title="Edit"><i class="fa fa-pencil text-aqua"></i></a>
                      </th>
                      <th><?php echo $row->NO_POTS; ?></th>
                      <th><?php echo $row->NO_INTERNET; ?></th>
                      <th><?php echo $row->NAMA_PELAPOR; ?></th>
                      <th><?php echo $row->ALAMAT_PELAPOR; ?></th>
                      <th><?php echo $row->PIC_PELAPOR; ?></th>
                      <th><?php echo $row->NAMA_MEDIA; ?></th>
                      <th><?php echo $row->NAMA_LAYANAN; ?></th>
                      <th><?php echo $row->JENIS_KOMPLAIN; ?></th>
                      <th><?php echo $row->TGL_KOMPLAIN; ?></th>
                      <th><?php echo $row->TGL_CLOSE; ?></th>
                      <th><?php echo $row->KELUHAN; ?></th>
                      <th><?php echo $row->SOLUSI; ?></th>
                      <th><?php echo $row->STATUS_KOMPLAIN; ?></th>
                      <th><?php echo $row->KETERANGAN; ?></th>
                      <th><?php echo $row->DOKUMEN; ?></th>
                      <th><?php echo $row->DEADLINE; ?></th>
                    </tr>
                    <?php
                    }
                  }
                }?>
              </tbody>
              <tfoot>
                <tr>
                  <th>AKSI</th>
                  <th>NO. POTS</th>
                  <th>NO. INTERNET</th>
                  <th>NAMA PELAPOR</th>
                  <th>ALAMAT PELAPOR</th>
                  <th>PIC PELAPOR</th>
                  <th>MEDIA</th>
                  <th>LAYANAN</th>
                  <th>JENIS KOMPLAIN</th>
                  <th>TGL KOMPLAIN</th>
                  <th>TGL CLOSE</th>
                  <th>KELUHAN</th>
                  <th>SOLUSI</th>
                  <th>STATUS</th>
                  <th>KETERANGAN</th>
                  <th>DOKUMEN</th>
                  <th>DEADLINE</th>
                </tr>
              </tfoot>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->