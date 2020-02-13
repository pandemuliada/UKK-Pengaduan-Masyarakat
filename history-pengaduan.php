<?php 
  include_once "init.php";

  $pengaduan = Pengaduan::all("WHERE nik = '". $Auth->current_user()->nik ."'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>History Pengaduan</title>
</head>
<body>
  
  <a href="home.php">Kembali</a>

  <h1>Riwayat Pengaduan Anda</h1>

  <ul>
    <?php foreach ($pengaduan as $item) : ?>
      <li>
        <h3><?= $item->judul_pengaduan ?></h3>
        <p><?= $item->isi_pengaduan ?></p>
        <p>Status : <?= $item->status ?></p>
      </li>
    <?php endforeach ?>    
  </ul>

</body>
</html>