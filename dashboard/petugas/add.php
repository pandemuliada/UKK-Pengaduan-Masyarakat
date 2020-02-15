<?php 
  include_once "../../init.php";

  if (isset($_POST["create"])) {
    $data = [
      "nama_petugas" => $_POST["nama_petugas"],
      "username" => $_POST["username"],
      "telepon" => $_POST["telepon"],
      "password" => $_POST["password"],
      "level" => "petugas"
    ];

    $created = Petugas::insert($data);

    if ($created) {
      echo "Petugas berhasil ditambahkan <a href='index.php'>Kembali</a>";
    } else {
      echo "Petugas gagal ditambahkan";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Petugas</title>
</head>
<body>
  
  <h1>Tambah Petugas</h1>

  <form action="" method="POST">
    <div>
      <label for="">Nama Petugas</label>
      <br>
      <input type="text" name="nama_petugas">
    </div>
    <div>
      <label for="">Telepon</label>
      <br>
      <input type="text" name="telepon">
    </div>
    <div>
      <label for="">Username</label>
      <br>
      <input type="text" name="username">
    </div>
    <div>
      <label for="">Password</label>
      <br>
      <input type="text" name="password">
    </div>
    <br>
    <button type="submit" name="create">Simpan</button>
  </form>

</body>
</html>