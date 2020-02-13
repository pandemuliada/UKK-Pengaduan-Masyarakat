<?php 
  include_once "../init.php";

  $id_pengaduan = $_GET["id_pengaduan"];
  $pengaduan = Pengaduan::first("WHERE id_pengaduan = '$id_pengaduan'");

  if (isset($_POST['save'])) {
    $data_tanggapan = [
      "id_pengaduan" => $id_pengaduan,
      "tgl_tanggapan" => date("Y/m/d"),
      "isi_tanggapan" => $_POST["isi_tanggapan"],
      "id_petugas" => $Auth->current_user()->id_petugas,
    ];

    $create_tanggapan = Tanggapan::insert($data_tanggapan);

    $data_pengaduan = [
      "status" => $_POST["status"]
    ];

    $update_pengaduan = Pengaduan::update(
      $data_pengaduan, 
      [
        "id_pengaduan" => $id_pengaduan 
      ]
    );

    if ($create_tanggapan && $update_pengaduan) {
      header("Location: list-pengaduan.php");
    }

  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Pengaduan - <?= $pengaduan->judul_pengaduan ?></title>
</head>
<body>
  
  <h1><?= $pengaduan->judul_pengaduan ?></h1>
  <p><?= $pengaduan->isi_pengaduan ?></p>

  <form action="" method="POST">
    <div>
      <label for="">Tanggapan Anda</label>
      <br>
      <textarea name="isi_tanggapan" cols="30" rows="10"></textarea>
    </div>
    
    <div>
      <label for="">Status Tanggapan</label>
      <br>
      <select name="status">
        <option value="ditolak" <?= $pengaduan->status == "ditolak" ? 'selected' : ''?>>Ditolak</option>
        <option value="proses" <?= $pengaduan->status == "proses" ? 'selected' : ''?>>Diproses</option>
        <option value="selesai" <?= $pengaduan->status == "selesai" ? 'selected' : ''?>>Selesai</option>
      </select>
    </div>

    <br>
    <button type="submit" name="save">Simpan</button>
  </form>


</body>
</html>