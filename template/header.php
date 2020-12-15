<?php 
  session_start();
  if(empty($_SESSION['id_user']) or empty($_SESSION['username'])) {
    echo "<script> alert('Silahkan Login Terlebih Dahulu');
  document.location='index.php';
  </script>";
  }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <title>Medika Teknologi</title>
  </head>
  <body>
        <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
      <div class="container">
        <h4 class="text-white">E-Arsip</h4>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="?halaman=" style="margin-left: 30px;">Beranda <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?halaman=penduduk">Data Kependudukan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?halaman=bantuan">Data Bantuan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?halaman=pembangunan">Data Pembangunan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?halaman=anggaran">Anggaran Dana</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- akhir navbar -->

    <!-- isi -->
    <div class="container" style="margin-bottom: 80px; margin-top: 80px; ">