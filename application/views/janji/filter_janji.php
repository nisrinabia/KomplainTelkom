<script>
function deldata() {
    return confirm('Apakah Anda yakin akan menghapus komplain ini? Untuk mengubah status komplain, gunakan tombol lihat disamping tombol hapus');
  }
</script>

<?php
  //Ambil tahun terendah dan tertinggi 
  foreach ($rendah as $row)
  {
      $tahun_rendah = $row->makan;
  }
  foreach ($tinggi as $row)
  {
      $tahun_tinggi = $row->makan;
  }
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manajemen Janji
      <small>Daftar Semua Janji</small>
    </h1>
    <ol class="breadcrumb">
      <li><i class="fa fa-list"></i> Manajemen janji</li>
      <li>Daftar semua janji</li>
      <li class="active">Filter</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

      <div class="alert alert-success">
        <?php echo 'Menampilkan janji pada bulan '.$bulan.' dan tahun '.$tahun.' dengan ';
        if($SKomplain == 'semua')
        {
          echo 'semua status komplain';
        }
        else
        {
          echo 'status komplain "'.$SKomplain.'"';
        }
      ?>
      </div>
        
        <div class="box">
          <div class="box-body">
              <h4>Navigasi</h4><hr>
              <a href="<?php echo base_url() ?>janji/lewat_deadline"><button type="button" class="btn btn-danger">Lihat janji melewati deadline</button></a>
              <a href="<?php echo base_url() ?>janji/sehari_deadline"><button type="button" class="btn btn-warning">Lihat janji mendekati deadline</button></a>
              <a href="<?php echo base_url() ?>janji/sebelum_deadline"><button type="button" class="btn btn-success">Lihat janji sebelum deadline</button></a>              
              <div class="pull-right"><a href="<?php echo base_url() ?>janji"> <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Kembali ke daftar semua janji">Kembali</button></a>
              </div>
              <br><br>
              <h4>Filter</h4><hr>
              <form method="get" action="<?php base_url() ?>filterall">
              Filter berdasarkan: 
                <select class="option-control" name="bulan" data-toggle="tooltip" data-placement="top" title="Pilih bulan">
                    <option value="01" <?php if($bulan == '01') {echo 'selected'; }?> >Januari</option>     
                    <option value="02" <?php if($bulan == '02') {echo 'selected'; }?> >Februari</option>
                    <option value="03" <?php if($bulan == '03') {echo 'selected'; }?> >Maret</option>
                    <option value="04" <?php if($bulan == '04') {echo 'selected'; }?> >April</option>
                    <option value="05" <?php if($bulan == '05') {echo 'selected'; }?> >Mei</option>
                    <option value="06" <?php if($bulan == '06') {echo 'selected'; }?> >Juni</option>
                    <option value="07" <?php if($bulan == '07') {echo 'selected'; }?> >Juli</option>
                    <option value="08" <?php if($bulan == '08') {echo 'selected'; }?> >Agustus</option>
                    <option value="09" <?php if($bulan == '09') {echo 'selected'; }?> >September</option>
                    <option value="10" <?php if($bulan == '10') {echo 'selected'; }?> >Oktober</option>
                    <option value="11" <?php if($bulan == '11') {echo 'selected'; }?> >November</option>
                    <option value="12" <?php if($bulan == '12') {echo 'selected'; }?> >Desember</option>
                  </select>
                  <select class="option-control" name="tahun" data-toggle="tooltip" data-placement="top" title="Pilih tahun">
                    <?php
                      if($rendah != NULL)
                      {
                        for ($i=$tahun_rendah; $i<=$tahun_tinggi; $i++)
                        {
                          echo '<option value="'.$i.'"'; if($i == $tahun) {echo "selected"; } echo '>'.$i.'</option>'; 
                          /*$i = $i + 1;*/
                        }
                      }
                      else
                      {
                        echo '<option value="';
                        echo date("Y");
                        echo '">';
                        echo date("Y");
                        echo '</option>';
                      }
                    ?> 
                  </select>
                  <select class="option-control" name="SKomplain" data-toggle="tooltip" data-placement="top" title="Pilih status komplain">
                    <?php
                    if($SKomplain == 'semua')
                    {
                      echo '<option value="semua" selected> Semua Status Komplain</option>';
                    }
                    else
                    {
                      echo '<option value="semua"> Semua Status Komplain</option>';
                    }

                    if($SKomplain == 'In Progress')
                    {
                      echo '<option value="In Progress" selected>In Progress</option>';
                    }
                    else
                    {
                      echo '<option value="In Progress">In Progress</option>';
                    }

                    if($SKomplain == 'Closed')
                    {
                      echo '<option value="Closed" selected>Closed</option>';
                    }
                    else
                    {
                      echo '<option value="Closed">Closed</option>';
                    }

                    if($SKomplain == 'Decline')
                    {
                      echo '<option value="Decline" selected>Decline</option>';
                    }
                    else
                    {
                      echo '<option value="Decline">Decline</option>';
                    }
                    ?>
                  </select>
                  <button type="submit" class="btn btn-success" id="bulan">Pilih</button>
                </form>
          </div>
        </div>

        <div class="box">
          <div class='box-header with-border'>
              <h3 class='box-title'>Daftar Semua Janji</h3>
            </div>
          <div class="box-body">
          <?php
          if($list != NULL)
          {
            echo '<a href="'.base_url().'janji/excelFilter/all/'.$bulan.'/'.$tahun.'"><button type="button" class="btn btn-primary">Unduh file excel</button></a>';
          }
          ?>
          <div class="pull-right" style="vertical-align:top;margin-top:5px;">
          <b style="vertical-align:top;">Keterangan: </b>
          <span class="legend" style="background-color:#F0E582!important"></span>Mendekati deadline (kurang dari sehari)
          <span class="legend" style="background-color:#F2D9CB!important"></span>Melewati deadline
          </div>
           <p></p>
            <table id="example1" class="table table-bordered">
              <thead>
                <tr>
                  <th style="background-color:#DEE3DD!important">AKSI</th>
                  <th style="background-color:#DEE3DD!important">DEADLINE</th>
                  <th style="background-color:#DEE3DD!important">NO. POTS</th>
                  <th style="background-color:#DEE3DD!important">NO. INTERNET</th>
                  <th style="background-color:#DEE3DD!important">NAMA PELAPOR</th>
                  <th style="background-color:#DEE3DD!important">LAYANAN</th>
                  <th style="background-color:#DEE3DD!important">JENIS KOMPLAIN</th>
                  <th style="background-color:#DEE3DD!important">TGL KOMPLAIN</th>
                  <th style="background-color:#DEE3DD!important">TGL CLOSE</th>
                  <th style="background-color:#DEE3DD!important">STATUS JANJI</th>
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
                      <th style="background-color:#F2D9CB!important">
                        <a href="<?php echo base_url() . 'janji/lihat/' . $row->ID_KOMPLAIN ?>" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fa fa-eye text-black fa-lg"></i></a>
                        <a href="<?php echo base_url() . 'janji/deleteWhenFilter/' . $row->ID_KOMPLAIN . '?mode=all&bulan=' . $bulan . '&tahun=' . $tahun?>" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return deldata()"><i class="fa fa-trash text-black fa-lg"></i></a>
                      </th>
                      <td style="background-color:#F2D9CB!important"><?php echo $row->DEADLINE; ?></td>
                      <td style="background-color:#F2D9CB!important"><?php echo $row->NO_POTS; ?></td>
                      <td style="background-color:#F2D9CB!important"><?php
                      if($row->NO_INTERNET == '')
                      {
                        echo '-';
                      }
                      else
                      {
                        echo $row->NO_INTERNET;
                      }
                      ?></td>
                      <td style="background-color:#F2D9CB!important"><?php
                      if($row->NAMA_PELAPOR == '')
                      {
                        echo '-';
                      }
                      else
                      {
                        echo $row->NAMA_PELAPOR;
                      }
                      ?></td>
                      <td style="background-color:#F2D9CB!important"><?php echo $row->NAMA_LAYANAN; ?></td>
                      <td style="background-color:#F2D9CB!important"><?php echo $row->JENIS; ?></td>
                      <td style="background-color:#F2D9CB!important"><?php
                      if($row->TGL_KOMPLAIN == '00-00-0000 00:00:00' || $row->TGL_KOMPLAIN == '')
                      {
                        echo '-';
                      }
                      else
                      {
                        echo $row->TGL_KOMPLAIN;
                      }?></td>
                      <td style="background-color:#F2D9CB!important"><?php
                      if($row->TGL_CLOSE == '00-00-0000' || $row->TGL_CLOSE == '')
                      {
                        echo '-';
                      }
                      else
                      {
                        echo $row->TGL_CLOSE;
                      }?></td>
                      <td style="background-color:#F2D9CB!important"><?php
                      if($row->STATUS_JANJI == '0')
                      {
                        echo 'Belum ditangani';
                      }
                      else
                      {
                        echo 'Telah ditangani';
                      }?></td>
                    </tr>
                    <?php
                    }
                    else if($hour > 0 && $hour <24)
                    {?>
                    <tr>
                      <th style="background-color:#F0E582!important">
                        <a href="<?php echo base_url() . 'janji/lihat/' . $row->ID_KOMPLAIN ?>" title="Lihat"><i class="fa fa-eye text-black fa-lg"></i></a>
                        <a href="<?php echo base_url() . 'janji/deleteWhenFilter/' . $row->ID_KOMPLAIN . '?mode=all&bulan=' . $bulan . '&tahun=' . $tahun?>" title="Hapus" onclick="return deldata()"><i class="fa fa-trash text-black fa-lg"></i></a>
                      </th>
                      <td style="background-color:#F0E582!important"><?php echo $row->DEADLINE; ?></td>
                      <td style="background-color:#F0E582!important"><?php echo $row->NO_POTS; ?></td>
                      <td style="background-color:#F0E582!important"><?php
                      if($row->NO_INTERNET == '')
                      {
                        echo '-';
                      }
                      else
                      {
                        echo $row->NO_INTERNET;
                      }
                      ?></td>
                      <td style="background-color:#F0E582!important"><?php
                      if($row->NAMA_PELAPOR == '')
                      {
                        echo '-';
                      }
                      else
                      {
                        echo $row->NAMA_PELAPOR;
                      }
                      ?></td>
                      <td style="background-color:#F0E582!important"><?php echo $row->NAMA_LAYANAN; ?></td>
                      <td style="background-color:#F0E582!important"><?php echo $row->JENIS; ?></td>
                      <td style="background-color:#F0E582!important"><?php
                      if($row->TGL_KOMPLAIN == '00-00-0000 00:00:00' || $row->TGL_KOMPLAIN == '')
                      {
                        echo '-';
                      }
                      else
                      {
                        echo $row->TGL_KOMPLAIN;
                      }?></td>
                      <td style="background-color:#F0E582!important"><?php
                      if($row->TGL_CLOSE == '00-00-0000' || $row->TGL_CLOSE == '')
                      {
                        echo '-';
                      }
                      else
                      {
                        echo $row->TGL_CLOSE;
                      }?></td>
                      <td style="background-color:#F0E582!important"><?php
                      if($row->STATUS_JANJI == '0')
                      {
                        echo 'Belum ditangani';
                      }
                      else
                      {
                        echo 'Telah ditangani';
                      }?></td>
                    </tr>
                    <?php
                    }
                    else if($hour > 24)
                    {?>
                    <tr>
                      <th>
                        <a href="<?php echo base_url() . 'janji/lihat/' . $row->ID_KOMPLAIN ?>" title="Lihat"><i class="fa fa-eye text-black fa-lg"></i></a>
                        <a href="<?php echo base_url() . 'janji/deleteWhenFilter/' . $row->ID_KOMPLAIN . '?mode=all&bulan=' . $bulan . '&tahun=' . $tahun?>" title="Hapus" onclick="return deldata()"><i class="fa fa-trash text-black fa-lg"></i></a>
                      </th>
                      <td><?php echo $row->DEADLINE; ?></td>
                      <td><?php echo $row->NO_POTS; ?></td>
                      <td><?php
                      if($row->NO_INTERNET == '')
                      {
                        echo '-';
                      }
                      else
                      {
                        echo $row->NO_INTERNET;
                      }
                      ?></td>
                      <td><?php
                      if($row->NAMA_PELAPOR == '')
                      {
                        echo '-';
                      }
                      else
                      {
                        echo $row->NAMA_PELAPOR;
                      }
                      ?></td>
                      <td><?php echo $row->NAMA_LAYANAN; ?></td>
                      <td><?php echo $row->JENIS; ?></td>
                      <td><?php
                      if($row->TGL_KOMPLAIN == '00-00-0000 00:00:00' || $row->TGL_KOMPLAIN == '')
                      {
                        echo '-';
                      }
                      else
                      {
                        echo $row->TGL_KOMPLAIN;
                      }?></td>
                      <td><?php
                      if($row->TGL_CLOSE == '00-00-0000' || $row->TGL_CLOSE == '')
                      {
                        echo '-';
                      }
                      else
                      {
                        echo $row->TGL_CLOSE;
                      }?></td>
                      <td><?php
                      if($row->STATUS_JANJI == '0')
                      {
                        echo 'Belum ditangani';
                      }
                      else
                      {
                        echo 'Telah ditangani';
                      }?></td>
                    </tr>
                    <?php
                    }
                  }
                }?>
              </tbody>
              <tfoot>
                <tr>
                  <th style="background-color:#DEE3DD!important">AKSI</th>
                  <th style="background-color:#DEE3DD!important">DEADLINE</th>
                  <th style="background-color:#DEE3DD!important">NO. POTS</th>
                  <th style="background-color:#DEE3DD!important">NO. INTERNET</th>
                  <th style="background-color:#DEE3DD!important">NAMA PELAPOR</th>
                  <th style="background-color:#DEE3DD!important">LAYANAN</th>
                  <th style="background-color:#DEE3DD!important">JENIS KOMPLAIN</th>
                  <th style="background-color:#DEE3DD!important">TGL KOMPLAIN</th>
                  <th style="background-color:#DEE3DD!important">TGL CLOSE</th>
                  <th style="background-color:#DEE3DD!important">STATUS JANJI</th>
                </tr>
              </tfoot>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->