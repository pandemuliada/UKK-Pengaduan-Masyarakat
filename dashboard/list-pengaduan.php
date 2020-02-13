<?php 
  include_once "../init.php";

  $pengaduan = Pengaduan::all();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Pengaduan</title>
</head>
<body>
  <a href="index.php">Kembali</a>
  <h1>Daftar Pengaduan</h1>

  <div style="display: flex; flex-direction: column">
    <?php foreach ($pengaduan as $item) : ?>
      <div>
        <h3><?= $item->judul_pengaduan ?></h3>
        <p><?= $item->tgl_pengaduan ?></p>
        <?php if ($item->status != "selesai") : ?>
          <a href="./detail-pengaduan.php?id_pengaduan=<?= $item->id_pengaduan ?>">Berikan Tanggapan</a>
        <?php endif ?>
        <?php if ($item->status == "selesai") : ?>
          <span style="background: #02b3e4; display: inline-block; padding: 5px; border-radius: 5px; color: white; margin-top: 5px">Telah ditanggapi</span>
        <?php endif ?>
      </div>
    <?php endforeach ?>
  </div>
</body>
</html>