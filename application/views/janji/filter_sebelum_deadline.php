<script>
function deldata() {
    return confirm('Apakah Anda yakin akan menghapus komplain ini? Untuk mengubah status komplain, gunakan tombol lihat disamping tombol hapus');
  }
</script>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manajemen Janji
    	<small>Daftar Semua Janji Sebelum Deadline</small>
    </h1>
    <ol class="breadcrumb">
      <li><i class="fa fa-list"></i> Manajemen janji</li>
      <li>Daftar semua janji sebelum deadline</li>
      <li class="active">Filter</li>
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
          		Menampilkan janji pada bulan ' . $coba . ' dan tahun ' . $tahun .'
        	</div>';
        ?>
        <div class="box">
          <div class="box-body">
              <h4>Navigasi</h4><hr>
              	<a href="<?php echo base_url() ?>janji"><button type="button" class="btn btn-primary">Lihat semua janji</button></a>
                <a href="<?php echo base_url() ?>janji/lewat_deadline"><button type="button" class="btn btn-danger">Lihat janji melewati deadline</button></a>
              	<a href="<?php echo base_url() ?>janji/sehari_deadline"><button type="button" class="btn btn-warning">Lihat janji mendekati deadline</button></a>              
                <div class="pull-right"><a href="<?php echo base_url() ?>janji/sebelum_deadline"> <button type="button" class="btn btn-primary">Kembali</button></a>
              </div>
              <br><br>
              <h4>Filter</h4><hr>
              <form method="get" action="<?php base_url() ?>filterbefore">
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
                    <?php
                      if($select != NULL)
                      {
                        foreach ($select as $row)
                        {
                          echo '<option value="'.$row->makan.'">'.$row->makan.'</option>';
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
                  <button type="submit" class="btn btn-success" id="bulan">Pilih</button>
                </form>
          </div>
        </div>

        <div class="box">
          <div class='box-header with-border'>
              <h3 class='box-title'>Daftar Semua Janji Sebelum Deadline</h3>
            </div>
          <div class="box-body">
          <?php
          if($list != NULL)
          {
            echo '<a href="'.base_url().'janji/excelFilter/before"><button type="button" class="btn btn-primary">Unduh file excel</button></a>';
          }
          ?>
          <p></p>
            <table id="example1" class="table table-bordered">
              <thead>
                <tr>
                  <th>AKSI</th>
                  <th>DEADLINE</th>
                  <th>NO. POTS</th>
                  <th>NO. INTERNET</th>
                  <th>NAMA PELAPOR</th>
                  <th>LAYANAN</th>
                  <th>JENIS KOMPLAIN</th>
                  <th>TGL KOMPLAIN</th>
                  <th>TGL CLOSE</th>
                  <th>STATUS</th>
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
                        <a href="<?php echo base_url() . 'janji/lihat/' . $row->ID_KOMPLAIN ?>" title="Lihat"><i class="fa fa-eye text-black fa-lg"></i></a>
                        <a href="<?php echo base_url() . 'janji/deleteWhenFilter/' . $row->ID_KOMPLAIN . '?mode=before&bulan=' . $bulan . '&tahun=' . $tahun?>" title="Hapus" onclick="return deldata()"><i class="fa fa-trash text-black fa-lg"></i></a>
                      </th>
                      <td style="background-color:#F2D9CB!important"><?php echo $row->DEADLINE; ?></td>
                      <td style="background-color:#F2D9CB!important"><?php echo $row->NO_POTS; ?></td>
                      <td style="background-color:#F2D9CB!important"><?php echo $row->NO_INTERNET; ?></td>
                      <td style="background-color:#F2D9CB!important"><?php echo $row->NAMA_PELAPOR; ?></td>
                      <td style="background-color:#F2D9CB!important"><?php echo $row->NAMA_LAYANAN; ?></td>
                      <td style="background-color:#F2D9CB!important"><?php echo $row->JENIS; ?></td>
                      <td style="background-color:#F2D9CB!important"><?php echo $row->TGL_KOMPLAIN; ?></td>
                      <td style="background-color:#F2D9CB!important"><?php echo $row->TGL_CLOSE; ?></td>
                      <td style="background-color:#F2D9CB!important"><?php echo $row->STATUS_JANJI; ?></td>
                    </tr>
                    <?php
                    }
                    else if($hour > 0 && $hour <24)
                    {?>
                    <tr>
                      <th style="background-color:#F0E582!important">
                        <a href="<?php echo base_url() . 'janji/lihat/' . $row->ID_KOMPLAIN ?>" title="Lihat"><i class="fa fa-eye text-black fa-lg"></i></a>
                        <a href="<?php echo base_url() . 'janji/deleteWhenFilter/' . $row->ID_KOMPLAIN . '?mode=before&bulan=' . $bulan . '&tahun=' . $tahun?>" title="Hapus" onclick="return deldata()"><i class="fa fa-trash text-black fa-lg"></i></a>
                      </th>
                      <td style="background-color:#F0E582!important"><?php echo $row->DEADLINE; ?></td>
                      <td style="background-color:#F0E582!important"><?php echo $row->NO_POTS; ?></td>
                      <td style="background-color:#F0E582!important"><?php echo $row->NO_INTERNET; ?></td>
                      <td style="background-color:#F0E582!important"><?php echo $row->NAMA_PELAPOR; ?></td>
                      <td style="background-color:#F0E582!important"><?php echo $row->NAMA_LAYANAN; ?></td>
                      <td style="background-color:#F0E582!important"><?php echo $row->JENIS; ?></td>
                      <td style="background-color:#F0E582!important"><?php echo $row->TGL_KOMPLAIN; ?></td>
                      <td style="background-color:#F0E582!important"><?php echo $row->TGL_CLOSE; ?></td>
                      <td style="background-color:#F0E582!important"><?php echo $row->STATUS_JANJI; ?></td>
                    </tr>
                    <?php
                    }
                    else if($hour > 24)
                    {?>
                    <tr>
                      <th>
                        <a href="<?php echo base_url() . 'janji/lihat/' . $row->ID_KOMPLAIN ?>" title="Lihat"><i class="fa fa-eye text-black fa-lg"></i></a>
                        <a href="<?php echo base_url() . 'janji/deleteWhenFilter/' . $row->ID_KOMPLAIN . '?mode=before&bulan=' . $bulan . '&tahun=' . $tahun?>" title="Hapus" onclick="return deldata()"><i class="fa fa-trash text-black fa-lg"></i></a>
                      </th>
                      <td><?php echo $row->DEADLINE; ?></td>
                      <td><?php echo $row->NO_POTS; ?></td>
                      <td><?php echo $row->NO_INTERNET; ?></td>
                      <td><?php echo $row->NAMA_PELAPOR; ?></td>
                      <td><?php echo $row->NAMA_LAYANAN; ?></td>
                      <td><?php echo $row->JENIS; ?></td>
                      <td><?php echo $row->TGL_KOMPLAIN; ?></td>
                      <td><?php echo $row->TGL_CLOSE; ?></td>
                      <td><?php echo $row->STATUS_JANJI; ?></td>
                    </tr>
                    <?php
                    }
                  }
                }?>
              </tbody>
              <tfoot>
                <tr>
                  <th>AKSI</th>
                  <th>DEADLINE</th>
                  <th>NO. POTS</th>
                  <th>NO. INTERNET</th>
                  <th>NAMA PELAPOR</th>
                  <th>LAYANAN</th>
                  <th>JENIS KOMPLAIN</th>
                  <th>TGL KOMPLAIN</th>
                  <th>TGL CLOSE</th>
                  <th>STATUS</th>
                </tr>
              </tfoot>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->