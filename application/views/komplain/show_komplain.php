<script>
function deldata() {
    return confirm('Apakah Anda yakin akan menghapus data ini?');
  }
</script>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Komplain
      <?php
      if($subjudul == 'Historis komplain pelanggan')
      {
        echo '<small>Historis Komplain Pelanggan</small>';
      }
      else
      {
        echo '<small>' . $subjudul . '</small>';
      }
      ?>
    </h1>
    <ol class="breadcrumb">
      <li><i class="fa fa-list"></i> Komplain</li>
      <?php
      if($subjudul == 'Historis komplain pelanggan')
      {
        echo '
        <li>Daftar data komplain</li>
        <li>Lihat Detail Komplain</li>
        <li class="active">Historis komplain pelanggan</li>
        ';
      }
      else
      {
        echo '<li class="active">' . $subjudul . '</li>';
      }
      ?>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
          <?php
          if($subjudul == 'Historis komplain pelanggan')
          {
            foreach($list as $row)
            {
              $nopots = $row->NO_POTS;
            }
            echo '<div class="alert alert-success">';
            echo 'Menampilkan historis pelanggan dengan nomor POTS '.$nopots.'</div>';
          }
          ?>
  <?php if($subjudul != 'Historis komplain pelanggan')
  { ?>
  <div class="box">
  	<div class="row">
      <div class="col-xs-12">
          <div class="box-body">
            <h4>Navigasi</h4><hr>
            <?php if($subjudul != 'Daftar Semua Unclosed Komplain') { ?><a href="<?php echo base_url() ?>komplain/showAllKomplain/4"><button type="button" class="btn btn-primary">Lihat Semua Unclosed Komplain</button></a> <?php } ?>
            <?php if($subjudul != 'Unclosed Hard Komplain') { ?><a href="<?php echo base_url() ?>komplain/showAllKomplain/1"><button type="button" class="btn btn-danger">Lihat Hard Komplain</button></a><?php } ?>
            <?php if($subjudul != 'Unclosed Gangguan') { ?><a href="<?php echo base_url() ?>komplain/showAllKomplain/2"><button type="button" class="btn btn-warning">Lihat Komplain Gangguan</button></a><?php } ?>
            <?php if($subjudul != 'Unclosed PSB') { ?><a href="<?php echo base_url() ?>komplain/showAllKomplain/3"><button type="button" class="btn btn-success">Lihat Komplain PSB</button></a><?php } ?>    
            <br><br>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <div class="box">
  <div class="box-header with-border">
        <h3 class="box-title"><?php echo $subjudul?></h3>
      </div><!-- /.box-header -->
    <div class="row">
      <div class="col-xs-12">
          <div class="box-body">
            <?php
            if($list != NULL)
            {
              if($subjudul == 'Historis komplain pelanggan')
              {
                echo '<a href="'.$uri.'"><button type="button" class="btn btn-primary">Kembali ke detil komplain pelanggan</button></a>';
                echo '  <a href="'.base_url().'komplain/excel/5?nopots='.$nopots.'"><button type="button" class="btn btn-primary">Unduh file excel</button></a><br>';
              }
              else
              {
                if($subjudul == 'Unclosed Hard Komplain')
                {
                  echo '<a href="'.base_url().'komplain/excel/1"><button type="button" class="btn btn-primary">Unduh file excel</button></a><br>';
                }
                else if($subjudul == 'Unclosed Gangguan')
                {
                  echo '<a href="'.base_url().'komplain/excel/2"><button type="button" class="btn btn-primary">Unduh file excel</button></a><br>';
                }
                else if($subjudul == 'Unclosed PSB')
                {
                  echo '<a href="'.base_url().'komplain/excel/3"><button type="button" class="btn btn-primary">Unduh file excel</button></a><br>';
                }
                else if($subjudul == 'Daftar Semua Unclosed Komplain')
                {
                  echo '<a href="'.base_url().'komplain/excel/4"><button type="button" class="btn btn-primary">Unduh file excel</button></a><br>';
                }
              }
            }
            ?>
            <br>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="background-color:#FACC2E!important" width="40px">AKSI</th>
                  <th style="background-color:#FACC2E!important">NO. POTS</th>
                  <th style="background-color:#FACC2E!important">NO. INTERNET</th>
                  <th style="background-color:#FACC2E!important">NAMA PELAPOR</th>
                  <th style="background-color:#FACC2E!important">ALAMAT PELAPOR</th>
                  <th style="background-color:#FACC2E!important">LAYANAN</th>
                  <th style="background-color:#FACC2E!important">JENIS KOMPLAIN</th>
                  <th style="background-color:#FACC2E!important">TGL KOMPLAIN</th>
                  <th style="background-color:#FACC2E!important">TGL CLOSE</th>
                  <th style="background-color:#FACC2E!important">STATUS KOMPLAIN</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if($list != NULL)
                {
                  foreach($list as $row)
                  { ?>
                  <tr>
                    <td> 
                      <a href="<?php echo base_url() . 'komplain/detailKomplain/' . $row->ID_KOMPLAIN ?>" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fa fa-eye text-black fa-lg"></i></a>
                      <a href="<?php echo base_url() . 'komplain/editKomplain/' . $row->ID_KOMPLAIN ?>" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fa fa-pencil text-black fa-lg"></i></a>
                      <a href="<?php echo base_url() . 'komplain/deleteKomplain/' . $row->ID_KOMPLAIN ?>" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return deldata();"><i class="fa fa-trash text-black fa-lg"></i></a>
                    </td>
                    <td><?php echo $row->NO_POTS; ?></td>
                    <td><?php echo $row->NO_INTERNET; ?></td>
                    <td><?php echo $row->NAMA_PELAPOR; ?></td>
                    <td><?php echo $row->ALAMAT_PELAPOR; ?></td>
                    <td><?php echo $row->NAMA_LAYANAN; ?></td>
                    <td><?php echo $row->JENIS_KOMPLAIN; ?></td>
                    <td><?php echo $row->TGL_KOMPLAIN; ?></td>
                    <td><?php if ($row->TGL_CLOSE == '0000-00-00') {echo '-';} else {echo $row->TGL_CLOSE;}  ?></td>
                    <td><?php echo $row->STATUS_KOMPLAIN; ?></td>
                  </tr>
                  <?php
                  }
                }?>
              </tbody>
              <tfoot>
                <tr>
                  <th style="background-color:#FACC2E!important">AKSI</th>
                  <th style="background-color:#FACC2E!important">NO. POTS</th>
                  <th style="background-color:#FACC2E!important">NO. INTERNET</th>
                  <th style="background-color:#FACC2E!important">NAMA PELAPOR</th>
                  <th style="background-color:#FACC2E!important">ALAMAT PELAPOR</th>
                  <th style="background-color:#FACC2E!important">LAYANAN</th>
                  <th style="background-color:#FACC2E!important">JENIS KOMPLAIN</th>
                  <th style="background-color:#FACC2E!important">TGL KOMPLAIN</th>
                  <th style="background-color:#FACC2E!important">TGL CLOSE</th>
                  <th style="background-color:#FACC2E!important">STATUS KOMPLAIN</th>
                </tr>
              </tfoot>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->