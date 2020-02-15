<?php
  include_once "../../init.php";

  $petugas = Petugas::all("WHERE level = 'petugas'");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Petugas</title>
</head>
<body>
  
  <h1>Daftar Petugas</h1>
  <a href="add.php">Tambah Petugas</a>
  <ul>
    <?php foreach ($petugas as $data) : ?>
      <li><?= $data->nama_petugas ?></li>
      <a href="detail.php?id_petugas=<?= $data->id_petugas ?>">Detail</a>
      <a href="delete.php?id_petugas=<?= $data->id_petugas ?>">Hapus</a>
    <?php endforeach ?>
  </ul>

</body>
</html>