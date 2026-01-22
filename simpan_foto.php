<?php
include 'config/database.php';

$nama = $_POST['nama_pekerjaan'];
$lokasi = $_POST['lokasi'];
$jenis = $_POST['jenis_pekerjaan'];
$progres = $_POST['progres'];

$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

move_uploaded_file($tmp, "foto/".$foto);

mysqli_query($conn,"INSERT INTO foto_pekerjaan VALUES(
  NULL,'$nama','$lokasi','$jenis','$progres','$foto',CURDATE()
)");

header("location:dashboard.php");
?>
