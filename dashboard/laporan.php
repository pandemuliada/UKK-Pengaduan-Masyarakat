<?php 
  include_once "../init.php";

  $data_laporan = $DB->connect()->query("SELECT judul_pengaduan, nama_masyarakat, tgl_pengaduan, nama_petugas, tgl_tanggapan  FROM v_laporan")->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan</title>

  <style>
    @media print {
      #printButton {
        display: none
      }
    }
  </style>
</head>
<body>

  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>Judul Pengaduan</th>
        <th>Dilaporkan oleh</th>
        <th>Tanggal dilaporkan</th>
        <th>Ditanggapi oleh</th>
        <th>Tanggal ditanggapi</th>
      </tr>
    </thead>
    <tbody>
      <?php $index = 0; ?>
      <?php foreach ($data_laporan as $laporan) : ?>
        <tr>
          <td><?= ++$index ?></td>
          <td><?= $laporan->judul_pengaduan ?></td>
          <td><?= $laporan->nama_masyarakat ?></td>
          <td><?= $laporan->tgl_pengaduan ?></td>
          <td><?= $laporan->nama_petugas ?></td>
          <td><?= $laporan->tgl_tanggapan ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>

  <button id="printButton" onclick="window.print()">Print Laporan</button>

</body>
</html>