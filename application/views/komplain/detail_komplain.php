<script>
function deldata() {
    return confirm('Apakah Anda yakin akan menghapus data ini?');
  }
</script>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manajemen Janji
      <small>Lihat Janji</small>
    </h1>
    <ol class="breadcrumb">
      <li><i class="fa fa-list"></i> Manajemen janji</li>
      <li>Daftar semua janji</li>
      <li class="active">Lihat Janji</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class='box-header with-border'>
              <h3 class='box-title'>Informasi data janji</h3>
          </div>
          <div class="box-body">

          <fieldset class="data-border">
		    <legend class="data-border">Data Pelapor</legend>
		    	<div class="row">
		    		<div class="col-xs-6">
				    <?php
		          	if($list != NULL)
		                {
		                  foreach($list as $row)
		                  {
		                  	echo '
		                  		<p><b>Nomor POTS</b><br>
		                  		';
		                  	if($row->NO_POTS == '')
		                  	{
		                  		echo '-';
		                  	}
		                  	else
		                  	{
		                  		echo $row->NO_POTS;
		                  	}
		                  	echo '</p>

		                  		<p><b>Nomor Internet</b><br>
		                  		';
		                  	if($row->NO_INTERNET == '')
		                  	{
		                  		echo '-';
		                  	}
		                  	else
		                  	{
		                  		echo $row->NO_INTERNET;
		                  	}
		                  	echo '</p>
		                  		</div>';

		                  	echo '<div class="col-xs-6">
		                  		<p><b>Nama Pelapor</b><br>
		                  		';
		                  	if($row->NAMA_PELAPOR == '')
		                  	{
		                  		echo '-';
		                  	}
		                  	else
		                  	{
		                  		echo $row->NAMA_PELAPOR;
		                  	}
		                  	echo '</p>

		                  		<p><b>Alamat Pelapor</b><br>
		                  		';

		                  	if($row->ALAMAT_PELAPOR == '')
		                  	{
		                  		echo '-';
		                  	}
		                  	else
		                  	{
		                  		echo $row->ALAMAT_PELAPOR;
		                  	}

		                  	echo'</p>

		                  		<p><b>PIC Pelapor</b><br>
		                  		';
		                  	if($row->PIC_PELAPOR == '')
		                  	{
		                  		echo '-';
		                  	}
		                  	else
		                  	{
		                  		echo $row->PIC_PELAPOR;
		                  	}

		                  	echo'</p>
		                  		';
		                    }
		                }
		               ?>
		            </div>
		        </div>
		   </fieldset>

			<fieldset class="data-border">
		    <legend class="data-border">Data Komplain</legend>
		    	<div class="row">
		    		<div class="col-xs-6">
				    <?php
		          	if($list != NULL)
		                {
		                  foreach($list as $row)
		                  {
		                  	echo '
		                  		<p><b>Nomor POTS</b><br>
		                  		';
		                  	if($row->NAMA_LAYANAN == '')
		                  	{
		                  		echo '-';
		                  	}
		                  	else
		                  	{
		                  		echo $row->NAMA_LAYANAN;
		                  	}
		                  	echo '</p>

		                  		<p><b>Jenis Komplain</b><br>
		                  		';
		                  	if($row->JENIS_KOMPLAIN == '')
		                  	{
		                  		echo '-';
		                  	}
		                  	else
		                  	{
		                  		echo $row->JENIS_KOMPLAIN;
		                  	}
		                  	echo '</p>

		                  		<p><b>Media</b><br>
		                  		';
		                  	if($row->NAMA_MEDIA == '')
		                  	{
		                  		echo '-';
		                  	}
		                  	else
		                  	{
		                  		echo $row->NAMA_MEDIA;
		                  	}
		                  	echo '</p>

		                  		<p><b>Tanggal Komplain</b><br>
		                  		';
		                  	if($row->TGL_KOMPLAIN == '')
		                  	{
		                  		echo '-';
		                  	}
		                  	else
		                  	{
		                  		echo $row->TGL_KOMPLAIN;
		                  	}
		                  	echo '</p>

		                  		<p><b>Tanggal Close</b><br>
		                  		';
		                  	if($row->TGL_CLOSE == '')
		                  	{
		                  		echo '-';
		                  	}
		                  	else
		                  	{
		                  		echo $row->TGL_CLOSE;
		                  	}
		                  	echo '</p>

		                  		<p><b>Deadline Janji</b><br>
		                  		';
		                  	if($row->DEADLINE == '')
		                  	{
		                  		echo '-';
		                  	}
		                  	else
		                  	{
		                  		echo $row->DEADLINE;
		                  	}
		                  	echo '</p>

		                  		<p><b>Status</b><br>
		                  		';
		                  	if($row->STATUS_KOMPLAIN == '0')
		                  	{
		                  		echo 'Belum ditangani';
		                  	}
		                  	else
		                  	{
		                  		echo 'Telah ditangani';
		                  	}
		                  	echo '</p>
		                  		</div>';

		                  	echo '<div class="col-xs-6">
		                  		<p><b>Keluhan</b><br>
		                  		';
		                  	if($row->KELUHAN == '')
		                  	{
		                  		echo '-';
		                  	}
		                  	else
		                  	{
		                  		echo $row->KELUHAN;
		                  	}
		                  	echo '</p>

		                  		<p><b>Solusi</b><br>
		                  		';

		                  	if($row->SOLUSI == '')
		                  	{
		                  		echo '-';
		                  	}
		                  	else
		                  	{
		                  		echo $row->SOLUSI;
		                  	}

		                  	echo'</p>

		                  		<p><b>Keterangan</b><br>
		                  		';
		                  	if($row->KETERANGAN == '')
		                  	{
		                  		echo '-';
		                  	}
		                  	else
		                  	{
		                  		echo $row->KETERANGAN;
		                  	}

		                  	echo'</p>
		                  		';
		                    }
		                }
		               ?>
		            </div>
		        </div>
		   </fieldset>

          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->