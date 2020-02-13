<!DOCTYPE html>
<?php 
  include_once "../init.php";
  
  if (!$Auth->current_user()) header("Location: ../index.php");

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Page</title>
</head>
<body>
  
  <h1>Ohayou <?= $Auth->current_user()->nama_petugas ?></h1>
  <p>Level anda adalah <?= ucfirst($Auth->current_user()->level) ?></p>

  <ul>
    <?php if ($Auth->current_user()->level == "admin") : ?>
      <li><a href="create-petugas.php">Tambah Petugas</a></li>
      <li><a href="list-pengaduan.php">Daftar Pengaduan</a></li>
      <li><a href="list-tanggapan.php">Daftar Tanggapan</a></li>
      <li><a href="laporan.php">Laporan</a></li>
    <?php endif ?>
    
    <?php if ($Auth->current_user()->level == "petugas") : ?>
      <li><a href="list-pengaduan.php">Daftar Pengaduan</a></li>
    <?php endif ?>
  </ul>

  <a href="../logout.php">Logout</a>


</body>
</html>