<?php
  include('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Data Printer </title>

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
            <h1>Edit Data Printer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
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
          <h3 class="card-title">Edit Data Surat</h3>
        </div>
        <div class="card-body">

        <?php
            // var_dump($_GET);
            $nomor_surat = $_GET['nomor_surat'];

            $data = $koneksi->query("SELECT nomor_surat, kategori, judul, file FROM arsip WHERE nomor_surat = '$nomor_surat' ");

            if($data->num_rows == 1){
                $data = $data->fetch_assoc();
            
        ?>

        <form method="post" action="simpan_edit.php?nomor_surat=<?php echo $data['nomor_surat']; ?>" enctype="multipart/form-data">
            <div class="form-group">
              <label class="col-sm-2 col-form-label"> Nomor Surat </label>
              <div class="col-sm-3">
                <input required type="text" name="nomor_surat" class="form-control" value="<?php echo $data['nomor_surat']?>" disabled>
              </div>
            </div>
            <div class="form-group">
            <label class="col-sm-2 col-form-label"> Kategori </label>
                <div class="col-sm-4">
                  <select name="kategori" class="form-control">
                    <option value="<?php echo $data['kategori']?>"><?php echo $data['kategori']?></option>
                    <option value="Undangan">Undangan</option>
                    <option value="Pengumuman">Pengumuman</option>
                    <option value="Nota Dinas">Nota Dinas</option>
                    <option value="Pemberitahuan">Pemberitahuan</option>
                  </select>
                </div>
            </div>
            <div class="form-group">
                <label> Judul </label>
                <input required type="text" name="judul" class="form-control" placeholder="Judul" value="<?php echo $data['judul']?>">
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-form-label"> File Surat (PDF) </label>
                <div class="col">
                  <object data="berkas/<?php echo $data['file'] ?>" width="100%" height="700px"></object>
                  <input type="file" name="NamaFileEdit" accept="application/pdf" class="form-control-file">
                </div>
            </div>
            <a href="index.php" class="btn btn-warning"> Kembali </a>
            <button type="submit" name="action" value="edit" class="btn btn-primary">Submit</button>
        </form>

        <?php
            } else{
                echo 'Data tidak ditemukan.';
            }
        ?>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
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
