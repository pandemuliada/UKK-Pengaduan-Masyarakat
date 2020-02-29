<?php 
  include_once "init.php";

  $pengaduan = Pengaduan::all("WHERE nik = '". $Auth->current_user()->nik ."' ORDER BY tgl_pengaduan DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>History Pengaduan</title>
  <link rel="stylesheet" href="<?= url('/assets/css/index.css') ?>">
</head>
<body>
  
  <div class='container' style="margin: 50px auto">
    <a href="home.php" style="display: inline-block; margin-bottom: 15px">Kembali</a>
    
    <h1 class='title-1'>Riwayat Pengaduan Anda</h1>

    <ul>
      <?php foreach ($pengaduan as $item) : ?>
        
        <li style="margin-bottom: 25px; background: #eee; padding: 30px">
        
          <?php if (!empty($item->foto)) : ?>
            <img src="<?= url("/uploads/" . $item->foto)?>" alt="<?= $item->judul_pengaduan ?>"/>
          <?php endif ?>

          <h3 class='title-3' style="font-weight: 500"><?= $item->judul_pengaduan ?></h3>
          <p><?= $item->isi_pengaduan ?></p>
          <br>
          <p>Status : <?= $item->status ?></p>
        </li>

      <?php endforeach ?>    
    </ul>
  </div>

</body>
</html>