<?php 
  include_once "init.php";

  $id_pengaduan = $_GET["id_pengaduan"];

  $pengaduan = Pengaduan::first("WHERE id_pengaduan = $id_pengaduan");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Tanggapan</title>
</head>
<body>
  
  <h1>Detail Laporan</h1>
  <hr>
  <?php if (!empty($pengaduan->foto)) : ?>
    <img src="<?= url("/uploads/" . $pengaduan->foto)?>" alt="<?= $pengaduan->judul_pengaduan ?>"/>
  <?php endif ?>
  <h3><?= $pengaduan->judul_pengaduan ?></h3>
  <p><?= $pengaduan->isi_pengaduan ?></p>
</body>
</html>