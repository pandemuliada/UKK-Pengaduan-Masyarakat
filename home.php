<?php 
  include_once 'init.php';

  if (!$Auth->current_user()) header("Location: login.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buat Pengaduan</title>
</head>
<body>
  <h1>Halo, <?= $Auth->current_user()->nama ?></h1>
  <p>Apakah anda ingin membuat pengaduan?</p>
  <a href="create-pengaduan.php">Buat Pengaduan</a>

  <br>
  <a href="logout.php">Logout</a>
</body>
</html>