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
</head>
<body>
  
  <h1>Pengaduan Yang Telah Ditanggapi</h1>

  <ul>
    <?php foreach ($laporan as $item) : ?>
    <li>
      <h3><?= $item->judul_pengaduan ?></h3>
      <p><?= $item->isi_tanggapan ?></p>
      <a href="detail-laporan.php?id_pengaduan=<?= $item->id_pengaduan ?>">Detail</a>
    </li>
    <?php endforeach ?>
  </ul>

</body>
</html>