<script>
function deldata() {
    return confirm('Benarkah Anda akan menghapus data ini ?');
  }
</script>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manajemen User
            <small>List User</small>
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
                <div class="box-header">
                  <h3 class="box-title">List User</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th width="30px">NO</th>
                        <th>NAMA LENGKAP</th>
                        <th>USERNAME</th>
                        <th>HAK AKSES</th>
                        <th width="30px">EDIT</th>
                        <th width="30px">HAPUS</th>
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
                        <th><?php echo $count; ?></th>
                        <th><?php echo $row->NAMA_LENGKAP; ?></th>
                        <th><?php echo $row->USERNAME; ?></th>
                        <th><?php echo $row->JABATAN; ?></th>
                        <?php if ($row->USERNAME != $this->session->userdata('username')) { ?>
                          <th><a href="<?php echo base_url() . 'users/edit/' . $row->ID_AKUN ?>"><i class="fa fa-pencil text-aqua"></i></a></th>
                          <th><a href="<?php echo base_url() . 'users/delete/' . $row->ID_AKUN ?>" onclick="return deldata()"><i class="fa fa-trash text-red"></i></a></th>
                        <?php } 
                        else { ?>
                          <th></th>
                          <th></th>
                        <?php } ?>
                      </tr>
                      <?php $count = $count + 1; } } 
                      else {
                        echo "Tidak ada akun yang terdaftar";
                      } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>NO</th>
                        <th>NAMA LENGKAP</th>
                        <th>USERNAME</th>
                        <th>HAK AKSES</th>
                        <th>EDIT</th>
                        <th>HAPUS</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->