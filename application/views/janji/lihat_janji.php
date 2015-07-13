<script type="text/javascript">
function confirmAction() {
    return confirm('Apakah Anda yakin akan mengubah status janji ini menjadi telah ditangani?');
  }
function confirmActionDel() {
    return confirm('Apakah Anda yakin akan menghapus dokumen ini?');
  }
function checkNull()
{
  var asek = document.getElementById("userFile").value;
  if(asek == "")
  {
    alert("Berkas belum dipilih. Silahkan pilih berkas terlebih dahulu");
    return false;
  }
  else
  {
    return true;
  }
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

          <?php
	            if($list != NULL)
		        {
		            foreach($list as $row)
		            {
		            $ref = urlencode(current_url().'?'.$_SERVER['QUERY_STRING']);
		          	echo '
		          		<form action="'.base_url().'janji/ubahStatus/'.$row->ID_KOMPLAIN.'" method="POST" enctype="multipart/form-data" >
							<a href="'.base_url().'janji"><button type="button" class="btn btn-primary">Kembali ke daftar semua janji</button></a>
							<input type="hidden" name="uri" value="'.base_url(uri_string()).'"/>
							<input type="submit" onclick="return confirmAction()" name="submit" value="Ubah status janji" class="btn btn-primary" />
							<a href="'.base_url().'komplain/editKomplain/'.$row->ID_KOMPLAIN.'?ref='.$ref.'"><button type="button" class="btn btn-primary">Ubah data komplain</button></a>
						</form>
						<br>';
					}
				}
				?>


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
		                  	$id = $row->ID_KOMPLAIN;
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

		                  		<p><b>Status Janji</b><br>
		                  		';
		                  	if($row->STATUS_JANJI == '0')
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
		                  	echo '</p>

		                  		<p><b>Dokumen</b><br>
		                  		';

		                  	if($row->DOKUMEN == '')
		                  	{
		                  		echo 'Belum ada dokumen';
								echo '
									<form id="upload" action="'.base_url().'janji/uploadDokumen/'.$row->ID_KOMPLAIN.'" method="POST" enctype="multipart/form-data" >
							            Unggah dokumen:<br />
							            <input type="file" id="userFile" name="userFile"/>
							            <input type="hidden" name="uri" value="'.base_url(uri_string()).'"/>
							            <input type="submit" onclick="return checkNull()" name="submit" style="margin-top:5px" value="Unggah dokumen" class="btn btn-success btn-sm" />
							         </form>';
		                  	}
		                  	else
		                  	{
		                  		echo ' 
		                  		<form action="'.base_url().'janji/hapusDokumen/'.$row->ID_KOMPLAIN.'" method="POST" enctype="multipart/form-data" >
									<input type="hidden" name="uri" value="'.base_url(uri_string()).'"/>
									<input type="hidden" name="doc" value="'.$row->DOKUMEN.'"/>
									<input type="submit" onclick="return confirmActionDel()" name="submit" value="Hapus" class="btn btn-danger btn-sm" />
									<a href="'.base_url().$row->DOKUMEN.'"><button type="button" class="btn btn-success btn-sm">Download dokumen</button></a>
								</form>
								<p class="fade in" id="errormsg" style="display:none;color:red"></p>';
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