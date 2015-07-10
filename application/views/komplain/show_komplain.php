<script>
function deldata() {
    return confirm('Apakah Anda yakin akan menghapus data ini?');
  }
</script>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo $judul ?>
    	<small>Daftar Data Komplain</small>
    </h1>
    <ol class="breadcrumb">
      <li><i class="fa fa-list"></i> Data Komplain</li>
      <li class="active">Daftar data komplain</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
  <div class="box">
  	<div class="row">
      <div class="col-xs-12">

          <div class="box-body">
            <?php
            if($list != NULL)
            {
              echo '<a href="'.base_url().'komplain/excel/"><button type="button" class="btn btn-primary">Unduh file excel</button></a><br/>';
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
                      <a href="<?php echo base_url() . 'komplain/detailKomplain/' . $row->ID_KOMPLAIN ?>" title="Lihat"><i class="fa fa-eye text-black fa-lg"></i></a>
                      <a href="<?php echo base_url() . 'komplain/editKomplain/' . $row->ID_KOMPLAIN ?>" title="Ubah"><i class="fa fa-pencil text-black fa-lg"></i></a>
                      <a href="<?php echo base_url() . 'komplain/deleteKomplain/' . $row->ID_KOMPLAIN ?>" title="Hapus" onclick="return deldata();"><i class="fa fa-trash text-black fa-lg"></i></a>
                    </td>
                    <td><?php echo $row->NO_POTS; ?></td>
                    <td><?php echo $row->NO_INTERNET; ?></td>
                    <td><?php echo $row->NAMA_PELAPOR; ?></td>
                    <td><?php echo $row->ALAMAT_PELAPOR; ?></td>
                    <td><?php echo $row->NAMA_LAYANAN; ?></td>
                    <td><?php echo $row->JENIS_KOMPLAIN; ?></td>
                    <td><?php echo $row->TGL_KOMPLAIN; ?></td>
                    <td><?php if ($row->TGL_CLOSE == '0000-00-00') {echo '-';} else {echo $row->TGL_CLOSE;}  ?></td>
                    <td><?php if ($row->STATUS_KOMPLAIN == '0') { echo 'In Progress';} elseif ($row->STATUS_KOMPLAIN =='1') {echo 'Closed';} else {echo 'Decline';}?></td>
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