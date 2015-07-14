<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <h1>
            Bantuan
            <small>Petunjuk Pemakaian Aplikasi</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Bantuan</a></li>
          </ol>
        </div>

        <!-- Main content -->
        <div class="content body">

<section id='tambahHardKomplain'>
  <h2 class='page-header'><a href="#tambahHardKomplain">Menambah Hard Komplain Baru</a></h2>
  <p class='lead'>
    Untuk menambah hard komplain baru, dapat dilakukan dengan dua cara, yaitu :
    <h4><u>Mengisi Form :</u></h4>
    <ol>
      <li>Klik menu <b>Hard Komplain > Tambah Komplain</b></li>
      <img src="<?php echo base_url() ?>/assets/docs/tambahKomplain1.png">      
      <li>Pada form di sebelah kiri, isi semua kotak terutama yang memiliki tanda (<span class="error">*</span>)</li>
      <li>Jika membuat janji dengan pelanggan, tambahkan waktu janji dengan klik tombol <button class="btn btn-primary">Tambah Waktu Janji</button> dan akan muncul kalender dengan default tanggal saat itu juga. Klik tombol <button class="btn btn-primary">Batal</button><br/></li>
      <img src="<?php echo base_url() ?>/assets/docs/tambahKomplain2.png">
      <li>Setelah selesai mengisikan data, klik tombol <b>Tambah Komplain</b></li>
    </ol>
    <h4><u>Mengunggah File Excel :</u></h4>
    <p>Untuk memasukkan data dalam jumlah yang banyak, dapat menggunakan file excel dengan cara :</p>
    <ol>
      <li>Klik menu <b>Hard Komplain > Tambah Komplain</b></li> 
      <li>Jika telah memiliki file excel yang sesuai format sistem, lanjut ke nomor 3.<br/>Jika belum, download template file excel yang sesuai format sistem dapat didownload dengan klik tombol <button class="btn btn-success">Download Template Excel</button> pada kotak di sebelah kanan</li>
      <img src="<?php echo base_url() ?>/assets/docs/tambahKomplain3.png"><br/>
      <li>Unggah file excel dengan klik tombol <b>Pilih File</b></li>
      <li>Klik tombol <button class="btn btn-primary">Unggah</button> untuk memasukkan seluruh data dalam file ke sistem</li><br/>
      <div class="callout callout-danger lead">
        <h4>Perhatian!</h4>
        <p>File excel yang diunggah HARUS mengikuti format yang diberikan sistem, baik pengisian mauapun jenis file yang diunggah</p>
      </div> 
    </ol>
  </p>
</section>

<section id='tambahKomplainPlasa'>
  <h2 class='page-header'><a href="#introduction">Menambah Komplain Plasa Baru</a></h2>
  <p class='lead'>
    <ol>
      <li>Klik <b>Menu > Layanan Plasa</b> <img src="<?php echo base_url() ?>assets/docs/layananplasa.png?>" height="35 px"></li>
      <li>Klik submenu <b>Layanan Plasa > Tambah Komplain Plasa</b></li>
      <img src="<?php echo base_url() ?>assets/docs/tambahkomplainplasa.png?>">
      <li>Terdapat dua pilihan untuk memasukkan Komplain Plasa:</li>
      <div class="well">
        <b>PSB</b> - Berupa rekues pasang baru, nomor POTS pada form tidak wajib diisi<br>
        <b>Gangguan</b> - Komplain selain pasang baru, dapat berupa alih paket, layanan tidak sesuai, dan sebagainya
      </div>
      <li>Isi seluruh field pada form yang bertanda * merah</li>
      <li>Anda juga dapat menambahkan janji dengan klik tombol <b>Tambah Waktu Janji</b> <img src="<?php echo base_url() ?>assets/docs/tgljanji.png?>" height="35 px"></li>
          <br>Lalu akan muncul tampilan kalender dan pilih tanggal dan waktu sesuai dengan janji yang dibuat
      <li>Klik tombol <b>Submit</b> apabila telah mengisi data yang diperlukan</li>
    </ol>
</section>

<section id='lihatKomplain'>
  <h2 class='page-header'><a href="#introduction">Melihat Daftar Komplain</a></h2>
  <p class='lead'>
    <ol>
      <li>Klik <b>Menu > Hard Komplain</b> <img src="<?php echo base_url() ?>assets/docs/hardkomplain.png?>" height="35 px"></li>
      <li>Klik submenu <b>Hard Komplain > Lihat Semua</b></li>
      <img src="<?php echo base_url() ?>assets/docs/lihatkomplain.png?>">
      <li>Halaman awal yang muncul menampilkan <b>Daftar Semua Komplain</b></li>
      <li>Terdapat beberapa pilihan untuk melihat komplain berdasarkan jenis dan status komplain: </li>
      <div class="well">
        <b>Lihat Unclosed Komplain</b> - Menampilkan daftar komplain yang statusnya masih In Progress<br>
        <b>Lihat Hard Komplain</b> - Menampilkan Komplain yang termasuk di dalam Hard Komplain<br>
        <b>Lihat Komplain Gangguan</b> - Menampilkan Komplain yang termasuk jenis Gangguan (selain PSB)<br>
        <b>Lihat Komplain PSB</b> - Menampilkan Komplain yang termasuk jenis PSB
      </div>
      <li>Terdapat 3 menu aksi: </li>
      <div class="well">
        <b>Lihat</b> - Menampilkan data komplain secara detail<br>
        <b>Ubah</b> - Mengubah data komplain<br>
        <b>Hapus</b> - Menghapus data Komplain
      </div>
      <li>Semua data dapat diunduh dengan klik tombol <b>Unduh File Excel</b></li>
    </ol>
</section>

<section id='lihatJanji'>
  <h2 class='page-header'><a href="#introduction">Melihat Janji dengan Customer</a></h2>
  <p class='lead'>
    Janji adalah <b>komplain yang memiliki janji dengan pelanggan</b>. Saat anda menginputkan tambah
    komplain baru, anda bisa menambahkan janji anda dengan pelanggan yang sedang anda layani. Janji tersebut memiliki <b>deadline</b>
    atau waktu tenggat. Untuk melihat janji dengan pelanggan, pilih menu <b>Layanan Plasa</b> &raquo; <b>Lihat semua janji</b>.
    Data komplain dengan janji yang <b>belum ditangani</b> diperlihatkan dalam tabel. Ada tiga kategori dalam manajemen janji:</p>

    <div class="well">
      <b>Janji melewati deadline</b> - Janji yang <b>melebihi waktu deadline dari sekarang dan belum ditangani</b>. Diwarnai dengan warna merah.
      <br>
      <b>Janji mendekati deadline</b> - Janji yang memiliki <b>waktu deadline kurang dari satu hari dari sekarang dan belum ditangani</b>. Diwarnai dengan warna kuning.
      <br>
      <b>Janji sebelum deadline</b> - Janji yang memiliki <b>waktu deadline lebih dari satu hari dari sekarang dan belum ditangani</b>. Tidak diwarnai (putih).
    </div>

    <p>Setiap data janji terdapat menu yang bisa anda pilih, yaitu</p>

    <div class="well">
      <span class="fa fa-eye fa-lg"></span>&nbsp;<b>Lihat janji</b> - Menampilkan informasi detil komplain dan janji, mengubah status janji 
      menjadi telah ditangani
      <br>
      <span class="fa fa-trash fa-lg"></span>&nbsp;&nbsp;<b>Hapus komplain</b> - Menghapus data komplain dari database
      <br>
    </div>

    <p>Untuk mengubah status janji menjadi <b>telah ditangani</b>, pilih data komplain dengan janji kemudian pilih
    menu <b>Lihat janji</b>. Pilih <b>Ubah status janji</b> untuk mengubah status janji.
    <br>
    </p>
    <h3>Filter Janji</b></h3>
    <p>
    Anda bisa memfilter <b>janji berdasarkan waktu deadline</b>
    </p>

    <div class="well">
      <b>Lihat janji melewati deadline</b> - Hanya tampilkan janji yang <b>melebihi waktu deadline dari sekarang dan belum ditangani</b>.
      <br>
      <b>Lihat janji mendekati deadline</b> - Hanya tampilkan janji yang memiliki <b>waktu deadline kurang dari satu hari dari sekarang dan belum ditangani</b>.
      <br>
      <b>Lihat janji sebelum deadline</b> - Hanya tampilkan janji yang memiliki <b>waktu deadline lebih dari satu hari dari sekarang dan belum ditangani</b>.
    </div>

    <div class="callout callout-info">
      <h4>Penting!</h4>
      <p>Ketika anda melakukan filter janji, anda bisa memilih opsi untuk melihat
      semua janji yang belum ditangani.</p>
    </div>

    <p>
      Selain filter janji berdasarkan waktu deadline. Anda bisa melakukan filter dengan <b>bulan</b>, <b>tahun</b>, dan <b>status komplain</b>.
      Anda bisa menggabungkan kedua filter.
    </p>

    <div class="well">
      <b>Filter bulan</b> - Tampilkan janji yang <b>belum ditangani</b> dan berada pada bulan yang dipilih.
      <br>
      <b>Filter tahun</b> - Tampilkan janji yang <b>belum ditangani</b> dan berada pada tahun yang dipilih.
      <br>
      <b>Filter status komplain</b> - Tampilkan janji yang <b>belum ditangani</b> dan memiliki status komplain yang dipilih.
    </div>

    <div class="callout callout-warning">
      <h4>Perhatian!</h4>
      <p>Untuk menggunakan filter ini, anda harus memilih semua filter yang disediakan.</p>
    </div>

    <p style="text-align:center;">
    <img src="<?php echo base_url()?>assets/doc/contohfilterjanji.jpg" style="width:100%;height:100%;">
    <i>Gambar</i> - Melakukan filter janji dengan menu lihat semua janji
    </p>

</section>

<section id='tambahMedia'>
  <h2 class='page-header'><a href="#introduction">Menambahkan Media Baru</a></h2>
  <p class='lead'>
    <b>AdminLTE</b> is a popular open source WebApp template for admin dashboards and control panels.
    It is a responsive HTML template that is based on the CSS framework Bootstrap 3.
    It utilizes all of the Bootstrap components in its design and re-styles many
    commonly used plugins to create a consistent design that can be used as a user
    interface for backend applications. AdminLTE is based on a modular design, which
    allows it to be easily customized and built upon. This documentation will guide you through
    installing the template and exploring the various components that are bundled with the template.
  </p>
</section>

<section id='tambahLayanan'>
  <h2 class='page-header'><a href="#introduction">Menambah Layanan Baru</a></h2>
  <p class='lead'>
    <b>AdminLTE</b> is a popular open source WebApp template for admin dashboards and control panels.
    It is a responsive HTML template that is based on the CSS framework Bootstrap 3.
    It utilizes all of the Bootstrap components in its design and re-styles many
    commonly used plugins to create a consistent design that can be used as a user
    interface for backend applications. AdminLTE is based on a modular design, which
    allows it to be easily customized and built upon. This documentation will guide you through
    installing the template and exploring the various components that are bundled with the template.
  </p>
</section>

<section id='tambahJenisKomplain'>
  <h2 class='page-header'><a href="#introduction">Menambah Jenis Komplain Baru</a></h2>
  <p class='lead'>
    <b>AdminLTE</b> is a popular open source WebApp template for admin dashboards and control panels.
    It is a responsive HTML template that is based on the CSS framework Bootstrap 3.
    It utilizes all of the Bootstrap components in its design and re-styles many
    commonly used plugins to create a consistent design that can be used as a user
    interface for backend applications. AdminLTE is based on a modular design, which
    allows it to be easily customized and built upon. This documentation will guide you through
    installing the template and exploring the various components that are bundled with the template.
  </p>
</section>

<section id="license">
  <h2 class="page-header"><a href="#license">Lisensi</a></h2>
  <h3>Si Karin</h3>
  <p class="lead">Si Karin (Sistem Informasi Komplain Terintegrasi) Telkom Malang adalah aplikasi berbasis web yang dikembangkan oleh <a href="#">Tim Kerja Praktik Teknik Informatik ITS 2015</a>.
    Aplikasi ini digunakan untuk monitoring komplain pelanggan yang masuk ke Telkom Malang, sehingga segala data komplain dapat dikelola dan dipantau kapan saja oleh yang berkepentingan dalam proses bisnis ini.</p>
  
  <p>Untuk pertanyaan lebih lanjut, dapat ditanyakan melalui email ke salah satu anggota <a href="#">Tim Kerja Praktik Teknik Informatik ITS 2015</a>.</p>
</section>

        </div><!-- /.content -->
      </div><!-- /.content-wrapper -->