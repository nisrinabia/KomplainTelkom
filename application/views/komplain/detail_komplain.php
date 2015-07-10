<script>
function deldata() {
    return confirm('Apakah Anda yakin akan menghapus data ini?');
  }
  function confirmActionDel() {
    return confirm('Apakah Anda yakin akan menghapus dokumen ini?');
  }
</script>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Komplain
      <small>Lihat Detail Komplain</small>
    </h1>
    <ol class="breadcrumb">
      <li><i class="fa fa-list"></i> Komplain</li>
      <li>Daftar data komplain</li>
      <li class="active">Lihat Detail Komplain</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <div class='box-header with-border'>
              <h3 class='box-title'>Detail Komplain</h3>
          </div>
          <div class="box-body">

          <?php
              if($list != NULL)
              {
	            foreach($list as $row)
	            {
	            	if($row->NO_POTS != '' || $row->NO_POTS != NULL)
	            	{
	            		echo '
	            		<form method="get" action="'.base_url().'komplain/showKomplainByPOTS/'.$row->NO_POTS.'">
	            		<a href="'.base_url().'komplain/showAllKomplain"><button type="button" class="btn btn-primary">Kembali ke daftar komplain</button></a>
	            		<a href="'.base_url().'komplain/editKomplain/'.$row->ID_KOMPLAIN.'"><button type="button" class="btn btn-primary">Edit data komplain</button></a>';
	            		echo '<input type="hidden" name="uri" value="'.base_url(uri_string()).'">
	            		<button type="submit" class="btn btn-primary">Lihat historis komplain pelanggan</button></a>
	            		</form>';
	            	}
	            	else
	            	{
	            		echo '<a href="'.base_url().'komplain/showAllKomplain"><button type="button" class="btn btn-primary">Kembali</button></a>';
	            	}
	            }
              }
          ?>
          <br>
          <fieldset class="data-border">
		    <legend class="data-border">Data Pelapor</legend>
		    	<div class="row">
		    		<div class="col-xs-6">
				    <?php
		          	if($list != NULL)
		                {
		                  foreach($list as $row)
		                  {
		                  	$doc = $row->DOKUMEN;
		                  	echo '<p><b>ID Komplain</b><br>';
		                  	echo $row->ID_KOMPLAIN;
		                  	echo '<p><b>Nomor POTS</b><br>';

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
		                    
		               ?>
		            </div>
		        </div>
		   </fieldset>

			<fieldset class="data-border">
		    <legend class="data-border">Data Komplain</legend>
		    	<div class="row">
		    		<div class="col-xs-6">
				    <?php
		                  	echo '
		                  		<p><b>Layanan</b><br>
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

		                  		<p><b>Status Komplain</b><br>
		                  		';
		                  	echo $row->STATUS_KOMPLAIN;
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
		                  		<p><b>Dokumen</b><br>
		                  		';
		                  	if($row->DOKUMEN == '')
		                  	{
		                  		echo 'Belum ada dokumen';
								echo '
									<form action="'.base_url().'komplain/unggahDokumen/'.$row->ID_KOMPLAIN.'" method="POST" enctype="multipart/form-data" >
							            Unggah dokumen:<br />
							            <input type="file" name="userFile"/>
							            <input type="hidden" name="uri" value="'.base_url(uri_string()).'"/>
							            <input type="submit" name="submit" value="Unggah dokumen" style="margin-top:5px;" class="btn btn-success btn-sm" />
							         </form>';
		                  	}
		                  	else
		                  	{
		                  		echo '
		                  			<div class="form-group">
		                  				<form action="'.base_url().'komplain/deleteDokumen/'.$row->ID_KOMPLAIN.'" method="POST" enctype="multipart/form-data" >
							            	<input type="hidden" name="doc" value="'.$doc.'"/>
							            	<input type="submit" name="submit" value="Hapus dokumen" onclick="return confirmActionDel()" class="btn btn-danger btn-sm" />
							        	 	<a href="'.base_url().$doc.'"><button type="button" class="btn btn-success btn-sm">Download Dokumen</button></a>
                    					</form>
                      				</div>
		                  		';
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

<!-- /.box-body -->
