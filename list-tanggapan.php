<?php 
  include_once "init.php";

  $nik_pengadu = $Auth->current_user()->nik;
  $laporan = $DB->query("SELECT * FROM v_laporan WHERE nik = '$nik_pengadu'")->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Laporan</title>
  <link rel="stylesheet" href="<?= url("/assets/css/index.css") ?>">
</head>
<body>
  
  <div class='container' style="margin: 50px auto">
    <a href="home.php" style="display: inline-block; margin-bottom: 15px">Kembali</a>
    
    <h1 class='title-1'>Pengaduan Yang telah di Tanggapi</h1>
    <ul>
      <?php foreach ($laporan as $item) : ?>
      <li style="margin-bottom: 25px; background: #eee; padding: 30px">
        <h3 class='title-3'><?= $item->judul_pengaduan ?></h3>
        <p><?= $item->isi_tanggapan ?></p>
        <br>
        <a href="detail-tanggapan.php?id_pengaduan=<?= $item->id_pengaduan ?>">Detail</a>
      </li>
      <?php endforeach ?>
    </ul>
  </div>
  <h1>Pengaduan Yang Telah Ditanggapi</h1>

</body>
</html>