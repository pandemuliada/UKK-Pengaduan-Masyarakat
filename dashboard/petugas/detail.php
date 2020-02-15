<?php  
  include_once "../../init.php";

  $id_petugas = $_GET["id_petugas"];

  $petugas = Petugas::first("WHERE id_petugas = $id_petugas");

  if (isset($_POST['reset_password'])) {
    
    $reset_password = Petugas::update(
      [
        "password" => md5("passwordreset")
      ],
      [
        "id_petugas" => $petugas->id_petugas
      ]
      );

    if ($reset_password) echo "Password berhasil di reset";
  
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Petugas</title>
</head>
<body>
  
  <h1>Detail Petugas</h1>

  <p>Nama : <?= $petugas->nama_petugas ?></p>
  <p>Username : <?= $petugas->username ?></p>
  <p>Level : <?= $petugas->level ?></p>
  <p>Telepon : <?= $petugas->telepon ?></p>

  <div style="display: flex;">
    <a href="edit.php?id_petugas=<?= $petugas->id_petugas ?>" role="button">Edit Data</a>
    <form action="" method="POST">
      <button name="reset_password">Reset Password</button>
    </form>
  </div>

</body>
</html>