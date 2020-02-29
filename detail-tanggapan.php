<?php 
  include_once "init.php";

  $id_pengaduan = $_GET["id_pengaduan"];

  $data_laporan = $DB->query("CALL select_laporan($id_pengaduan)")->fetch();
  $data_petugas = Petugas::first("WHERE id_petugas = '$data_laporan->id_petugas'");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Tanggapan</title>
  <link rel="stylesheet" href="<?= url("/assets/css/index.css") ?>">
</head>
<body>
  
  <div class="container" style="margin: 50px auto">
    <a href="list-tanggapan.php" style="display: inline-block; margin-bottom: 20px">Kembali</a>
    <h1 class='title-1'>Detail Tanggapan</h1>
    <hr style="margin-bottom: 20px">
    <h3 class='title-3'><?= $data_laporan->judul_pengaduan ?></h3>
    <span style="display: block; margin-bottom: 10px">Diadukan pada : <?= $data_laporan->tgl_pengaduan ?> Oleh <?= $data_laporan->nama_masyarakat ?></span>
    <b style="display: block; margin-bottom: 10px">Isi : </b>
    <p style="display: block; margin-bottom: 10px"><?= $data_laporan->isi_pengaduan ?></p>
    <b style="display: block; margin-bottom: 10px">Tanggapan : </b>
    <p style="display: block; margin-bottom: 10px"><?= $data_laporan->isi_tanggapan ?></p>
    <div>
      <p>Ditanggapi oleh : <?= $data_petugas->nama_petugas ?> <br> Pada <?= $data_laporan->tgl_tanggapan ?></p>
    </div>
  </div>
</body>
</html>