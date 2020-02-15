<?php 
  include_once "../../init.php";

  $id_petugas = $_GET["id_petugas"];
  $petugas = Petugas::first("WHERE id_petugas = $id_petugas");

  if (isset($_POST["update"])) {
    $data = [
      "nama_petugas" => $_POST["nama_petugas"],
      "username" => $_POST["username"],
      "telepon" => $_POST["telepon"],
    ];

    $updated = Petugas::update($data, 
      [
        "id_petugas" => $petugas->id_petugas
      ]
    );

    if ($updated) {
      header("Refresh:0");
      echo "Data petugas berhasil diubah";
    } else {
      echo "Data petugas gagal diubah";
    }

  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data Petugas</title>
</head>
<body>
  
  <form action="" method="POST">
    <div>
      <label for="">Nama Petugas</label>
      <br>
      <input type="text" name="nama_petugas" value="<?= $petugas->nama_petugas ?>">
    </div>
    <div>
      <label for="">Username Petugas</label>
      <br>
      <input type="text" name="username" value="<?= $petugas->username ?>">
    </div>
    <div>
      <label for="">Telepon</label>
      <br>
      <input type="text" name="telepon" value="<?= $petugas->telepon ?>">
    </div>
    <br>
    <button type="submit" name="update">Update Data</button>
  </form>

</body>
</html>