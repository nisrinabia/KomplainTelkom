<script>
function deldata() {
    return confirm('Apakah Anda yakin akan menghapus data ini?');
  }
</script>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Komplain
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
            <br>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="background-color:#F6A2A1!important">AKSI</th>
                  <th>NO. POTS</th>
                  <th>NO. INTERNET</th>
                  <th>NAMA PELAPOR</th>
                  <th>ALAMAT PELAPOR</th>
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
                  { ?>
                  <tr>
                    <td> <a href="<?php echo base_url() . 'komplain/lihat/' . $row->ID_KOMPLAIN ?>" title="Lihat"><i class="fa fa-eye text-black"></i></a>
                    <a href="<?php echo base_url() . 'komplain/editKomplain/' . $row->ID_KOMPLAIN ?>" title="Edit"><i class="fa fa-pencil text-black"></i></a></td>
                    <td><?php echo $row->NO_POTS; ?></td>
                    <td><?php echo $row->NO_INTERNET; ?></td>
                    <td><?php echo $row->NAMA_PELAPOR; ?></td>
                    <td><?php echo $row->ALAMAT_PELAPOR; ?></td>
                    <td><?php echo $row->NAMA_LAYANAN; ?></td>
                    <td><?php echo $row->JENIS_KOMPLAIN; ?></td>
                    <td><?php echo $row->TGL_KOMPLAIN; ?></td>
                    <td><?php if ($row->TGL_CLOSE == '0000-00-00') {echo '-';} else {echo $row->TGL_CLOSE;}  ?></td>
                    <td><?php if ($row->STATUS_KOMPLAIN == '0') { echo 'In Progress';} else {echo 'Closed';} ?></td>
                  </tr>
                  <?php
                  }
                }?>
              </tbody>
              <tfoot>
                <tr>
                  <th style="background-color:#F6A2A1!important">AKSI</th>
                  <th>NO. POTS</th>
                  <th>NO. INTERNET</th>
                  <th>NAMA PELAPOR</th>
                  <th>ALAMAT PELAPOR</th>
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