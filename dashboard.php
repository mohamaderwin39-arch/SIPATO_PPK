<?php
session_start();
if(!isset($_SESSION['login'])){
  header("location:index.html");
}
include 'config/database.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard PPK</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark" style="background:#0d6efd">
  <div class="container">
    <span class="navbar-brand">Dokumentasi Pekerjaan Jalan</span>
    <a href="logout.php" class="btn btn-warning btn-sm">Logout</a>
  </div>
</nav>

<div class="container mt-4">
  <a href="tambah_foto.html" class="btn btn-primary mb-3">+ Tambah Foto</a>

  <div class="row">
    <?php
    $data = mysqli_query($conn,"SELECT * FROM foto_pekerjaan ORDER BY tanggal DESC");
    while($d = mysqli_fetch_array($data)){
    ?>
    <div class="col-md-4 mb-3">
      <div class="card shadow-sm">
        <img src="foto/<?= $d['foto'] ?>" class="card-img-top">
        <div class="card-body">
          <h6><?= $d['nama_pekerjaan'] ?></h6>
          <p class="small mb-1">📍 <?= $d['lokasi'] ?></p>
          <p class="small mb-1">🔧 <?= $d['jenis_pekerjaan'] ?></p>
          <p class="small mb-1">📊 Progres: <?= $d['progres'] ?></p>
          <p class="small text-muted"><?= $d['tanggal'] ?></p>
          <a href="hapus_foto.php?id=<?= $d['id'] ?>" class="btn btn-danger btn-sm"
             onclick="return confirm('Hapus foto?')">Hapus</a>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>

</body>
</html>
