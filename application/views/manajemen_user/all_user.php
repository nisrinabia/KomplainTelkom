<script>
function deldata() {
    return confirm('Apakah Anda yakin akan menghapus data ini?');
  }
</script>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manajemen User
            <small>Daftar User</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i> Manajemen User</a></li>
            <li class="active">Lihat Semua</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
                  <form action="<?php echo base_url() ?>users">
                    <input type="submit" class="btn btn-primary" value="Tambah user">
                  </form>
                  <br>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="background-color:#FACC2E!important" width="30px">NO</th>
                        <th style="background-color:#FACC2E!important">NAMA LENGKAP</th>
                        <th style="background-color:#FACC2E!important">USERNAME</th>
                        <th style="background-color:#FACC2E!important">HAK AKSES</th>
                        <th style="background-color:#FACC2E!important" width="20px">EDIT</th>
                        <th style="background-color:#FACC2E!important" width="20px">HAPUS</th>
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
                        <td><?php echo $row->NAMA_LENGKAP; ?></td>
                        <td><?php echo $row->USERNAME; ?></td>
                        <td><?php echo $row->JABATAN; ?></td>
                        <?php if ($row->USERNAME != $this->session->userdata('username')) { ?>
                          <td><a href="<?php echo base_url() . 'users/edit/' . $row->ID_AKUN ?>"><i class="fa fa-pencil text-aqua fa-lg"></i></a></td>
                          <td><a href="<?php echo base_url() . 'users/delete/' . $row->ID_AKUN ?>" onclick="return deldata()"><i class="fa fa-trash text-red fa-lg"></i></a></td>
                        <?php } 
                        else { ?>
                          <td></td>
                          <td></td>
                        <?php } ?>
                      </tr>
                      <?php $count = $count + 1; } }?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th style="background-color:#FACC2E!important">NO</th>
                        <th style="background-color:#FACC2E!important">NAMA LENGKAP</th>
                        <th style="background-color:#FACC2E!important">USERNAME</th>
                        <th style="background-color:#FACC2E!important">HAK AKSES</th>
                        <th style="background-color:#FACC2E!important">EDIT</th>
                        <th style="background-color:#FACC2E!important">HAPUS</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->