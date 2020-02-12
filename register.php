<?php 

  include_once 'init.php';

  if (isset($_POST["register"])) {
    // If data valid
    if ( !empty($_POST['nik']) || !empty($_POST['nama']) || !empty($_POST['telepon']) || !empty($_POST['username']) || !empty($_POST['password']) ) {
    
      $data = [
        "nik" => $_POST['nik'],
        "nama" => $_POST['nama'],
        "telepon" => $_POST['telepon'],
        "username" => $_POST['username'],
        "password" => md5($_POST['password'])
      ];
    
      $register = Masyarakat::insert($data);

      if ($register) echo "Data berhasil terdaftar";

    } else {
      echo "Tolong masukan data yang valid";
    }

  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Masyarakat</title>
</head>
<body>
  
  <div>
    <form action="" method="POST">
      <div>
        <label for="">NIK</label>
        <br>
        <input type="text" name="nik">
      </div>

      <div>
        <label for="">Nama</label>
        <br>
        <input type="text" name="nama">
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
        <input type="password" name="password">
      </div>
      
      <button type="submit" name="register">Register</button>
    </form>
  </div>

</body>
</html>