<?php 
  include_once "init.php";

  if (isset($_POST['create'])) {

    if ( !empty($_POST['judul_pengaduan']) && !empty($_POST['isi_pengaduan'])) {
      if (!empty($_FILES['foto'])) {
        $file = $_FILES['foto'];
        $target_file = "uploads/" . basename($file['name']); 
      }

      
      $data = [
        "nik" => $Auth->current_user()->nik,
        "judul_pengaduan" => $_POST['judul_pengaduan'],
        "isi_pengaduan" => $_POST['isi_pengaduan'],
        "tgl_pengaduan" => date("Y/m/d"),
        "foto" => $file ? $file['name'] : null
      ];
      
      $created = Pengaduan::insert($data);

      if ($created) {
        if (!empty($_FILES['foto'])) {
          move_uploaded_file($file['tmp_name'], $target_file);
        }
        $success = "Pengaduan berhasil dibuat <a href='./history-pengaduan.php'>Lihat riwayat pengaduan</a>";
        redirect("/history-pengaduan.php");
      } else {
        $error = "Data yang dimasukan tidak valid!";
      }
    } else {
      $error = "Data yang dimasukan tidak valid!";
    }
    
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buat Pengaduan</title>
  <link rel="stylesheet" href="<?= url('/assets/css/index.css') ?>">
</head>
<body>
  <div class='container' style="margin: 50px auto">
    <div style="margin: 20px 0; color: red"><?= $error??null ?></div>
    <div style="margin: 20px 0; color: green"><?= $success??null ?></div>

    <h1 class='title-1'>Buat Pengaduan</h1>
    <div style='width: 500px'>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class='field-wrapper'>
          <label class='label' for="">Judul Pengaduan*</label>
          <input class='input' type="text" name="judul_pengaduan">
        </div>
        <div class='field-wrapper'>
          <label class='label' for="">Isi Pengaduan*</label>
          <textarea class='input' name="isi_pengaduan" cols="30" rows="10"></textarea>
        </div>
        <div class='field-wrapper'>
          <label class='label' for="">Foto (Opsional)</label>
          <input type="file" name="foto">
        </div>
        <button class='button-primary block' type="submit" name="create">Kirim</button>
      </form>
    </div>
  </div>
</body>
</html>