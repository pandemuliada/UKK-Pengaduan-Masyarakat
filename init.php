<?php 
  include_once "config/Database.php";
  include_once "controller/Auth.php";
  include_once "model/Model.php";
  include_once "model/Masyarakat.php";
  include_once "model/Petugas.php";
  include_once "model/Pengaduan.php";
  include_once "model/Tanggapan.php";

  include_once "functions.php";

  $DB = new Database;
  $Auth = new Auth;
?>