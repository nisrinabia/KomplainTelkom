<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<!-- <h4>A PHP Error was encountered</h4>

<p>Severity: <?php echo $severity; ?></p>
<p>Message:  <?php echo $message; ?></p>
<p>Filename: <?php echo $filepath; ?></p>
<p>Line Number: <?php echo $line; ?></p>

<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>

	<p>Backtrace:</p>
	<?php foreach (debug_backtrace() as $error): ?>

		<?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>

			<p style="margin-left:10px">
			File: <?php echo $error['file'] ?><br />
			Line: <?php echo $error['line'] ?><br />
			Function: <?php echo $error['function'] ?>
			</p>

		<?php endif ?>

	<?php endforeach ?>

<?php endif ?> -->

<!-- Halaman error pengganti, uncomment code diatas untuk mengembalikan debugger page -->
<!-- Content Wrapper. Contains page content -->
      <!-- <div class="content-wrapper"> -->
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            500 Error Page
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="error-page">
            <h2 class="headline text-red">500</h2>
            <div class="error-content">
              <h3><i class="fa fa-warning text-red"></i> Kesalahan akses.</h3>
              <p>
                Saat ini Anda mengakses sebuah halaman yang tidak ada, mungkin Anda bisa <a href='<?php echo base_url() ?>'>kembali ke dashboard</a> atau mengakses halaman lain pada menu.
              </p>
            </div>
          </div><!-- /.error-page -->

        </section><!-- /.content -->
<!--       </div>/.content-wrapper -->

</div>