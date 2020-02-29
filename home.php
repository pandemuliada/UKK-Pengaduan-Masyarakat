<?php 
  include_once 'init.php';

  if (!$Auth->current_user()) header("Location: login.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="<?= url('/assets/css/index.css') ?>">
</head>
<body>
  <div class='container' style="margin: 50px auto">
    <h1 class='title-1'>Halo, <?= $Auth->current_user()->nama ?></h1>
    <p>Apakah anda ingin membuat pengaduan?</p>
    <br>
    <ul>
      <li>
        <a href="create-pengaduan.php">Buat Pengaduan</a>
      </li>
      <li>
        <a href="history-pengaduan.php">Riwayat  Pengaduan</a>
      </li>
      <li>
        <a href="list-tanggapan.php">Daftar Tanggapan</a>
      </li>
    </ul>
    <a href="logout.php">Logout</a>
  </div>
</body>
</html>