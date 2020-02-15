<?php 
  include_once "../../init.php";

  $id_petugas = $_GET["id_petugas"];

  $deleted = Petugas::delete([
    "id_petugas" => $id_petugas
  ]);

  if ($deleted) {
    header("Location: index.php");
  }

?>