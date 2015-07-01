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