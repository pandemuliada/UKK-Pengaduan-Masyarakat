<?php 
  include_once "../init.php";

  $id_pengaduan = $_GET["id_pengaduan"];

  $data_laporan = $DB->query("CALL select_laporan($id_pengaduan)")->fetch();
  $data_petugas = Petugas::first("WHERE id_petugas = '$data_laporan->id_petugas'");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Laporan</title>
</head>
<body>
  
  <h1>Detail Laporan</h1>
  <hr>
  <h3><?= $data_laporan->judul_pengaduan ?></h3>
  <span>Diadukan pada : <?= $data_laporan->tgl_pengaduan ?> Oleh <?= $data_laporan->nama_masyarakat ?></span>
  <p><?= $data_laporan->isi_pengaduan ?></p>
  <span>Tanggapan : </span>
  <br>
  <p><?= $data_laporan->isi_tanggapan ?></p>

  <div>
    <p>Ditanggapi oleh : <?= $data_petugas->nama_petugas ?> <br> Pada <?= $data_laporan->tgl_tanggapan ?></p>
  </div>
</body>
</html>