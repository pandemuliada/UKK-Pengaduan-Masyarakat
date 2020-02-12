<?php 
  include_once "init.php";
  session_start();

  if (isset($_POST['create'])) {
    if ( !empty($_POST['judul_pengaduan']) || !empty($_POST['isi_pegaduan']) ) {
      $file = $_FILES['foto'];
      $target_file = "uploads/" . basename($file['name']); 

      $data = [
        "nik" => $Auth->current_user()->nik,
        "judul_pengaduan" => $_POST['judul_pengaduan'],
        "isi_pengaduan" => $_POST['isi_pengaduan'],
        "tgl_pengaduan" => date("Y/m/d"),
        "foto" => $file['name'] ?? null
      ];
      
      $created = Pengaduan::insert($data);

      if ($created) {
        $uploaded = move_uploaded_file($file['tmp_name'], $target_file);
        echo "Pengaduan berhasil dibuat";
      }

    } else {
      echo "Tolong isi data yang valid";
    }

  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buat Pengaduan</title>
</head>
<body>
  <h1>Buat Pengaduan</h1>
  <div>
    <form action="" method="POST" enctype="multipart/form-data">
      <div>
        <label for="">Judul Pengaduan*</label>
        <br>
        <input type="text" name="judul_pengaduan">
      </div>
      <div>
        <label for="">Isi Pengaduan*</label>
        <br>
        <textarea name="isi_pengaduan" cols="30" rows="10"></textarea>
      </div>
      <div>
        <label for="">Foto (Opsional)</label>
        <br>
        <input type="file" name="foto">
      </div>
      <br>
      <button type="submit" name="create">Kirim</button>
    </form>
  </div>
  
  <br>
  <br>
  <a href="history-pengaduan.php">Lihat semua pengaduan anda</a>



</body>
</html>