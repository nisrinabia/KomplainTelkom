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
  <div class="box">
  	<div class="row">
      <div class="col-xs-12">
          <div class="box-body">
            <form action="<?php echo base_url() ?>jenis_komplain/tambah">
              <input type="submit" class="btn btn-primary" value="Tambah jenis komplain">
            </form>
            <br>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th style="background-color:#FACC2E!important" width="30px">NO</th>
                  <th style="background-color:#FACC2E!important">JENIS KOMPLAIN</th>
                  <th style="background-color:#FACC2E!important" width="30px">AKSI</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $count=1;
                if($list != NULL)
                {
                  foreach($list as $row)
                  { ?>
                  <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $row->JENIS; ?></td>
                      <td>
                        <a href="<?php echo base_url() . 'jenis_komplain/edit/' . $row->JENIS ?>" title="Edit"><i class="fa fa-pencil text-aqua"></i></a>
                        <a href="<?php echo base_url() . 'jenis_komplain/delete/' . $row->JENIS?>" title="Hapus" onclick="return deldata()"><i class="fa fa-trash text-red"></i></a>
                      </td>
                  </tr>
                  <?php 
                  $count = $count + 1;
                  }
                }?>
              </tbody>
              <tfoot>
                <tr>
                  <th style="background-color:#FACC2E!important">NO</th>
                  <th style="background-color:#FACC2E!important">JENIS KOMPLAIN</th>
                  <th style="background-color:#FACC2E!important">AKSI</th>
                </tr>
              </tfoot>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->