<?php
  include('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Arsip Surat | Lihat</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
    include('sidebar.php');
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Arsip Surat >> Lihat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Arsip Surat</a></li>
              <li class="breadcrumb-item active">Lihat</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
        </div>

        <div class="card-body">
        <?php

$nomor_surat = $_GET['nomor_surat'];

echo "Nomor Surat: ".$nomor_surat."<br>";

$query = mysqli_query($koneksi, "SELECT * FROM arsip WHERE nomor_surat = '$nomor_surat'");
while ($dt = mysqli_fetch_assoc($query)) {
  ?>
  <?php
    echo "Kategori: ".$dt['kategori']."<br>";
    echo "Judul: ".$dt['judul']."<br>";
    echo "Waktu Unggah: ".$dt['waktu_pengarsipan']."<br>";

  ?>
  <br>
  <object data="berkas/<?php echo $dt['file'] ?>" width="100%" height="700px"></object>
<br>
<br>
        <a href="index.php" class="btn btn-primary"> Kembali </a>
        <a href="berkas/<?php echo $dt['file'];?> "download="<?php echo $dt['file'];?>" class="btn btn-warning"> Unduh </a>
        <a href="edit_data.php?nomor_surat=<?php echo $dt['nomor_surat']; ?>" class="btn btn-danger"> Edit / Ganti File </a>
      
        <?php
}
?>

        <!-- <input type="file" name="NamaFile" accept="application/pdf" class="form-control-file"> -->
      
      </div>
          <!-- </form> -->
        <!-- /.card-body -->
        <!-- <div class="card-footer">
          Footer
        </div> -->
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0-rc
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
