<?php 
  
  include_once "config/Database.php";
  include_once "model/ORM.php";
  include_once "model/Masyarakat.php";

  $masyarakat = Masyarakat::update(
    [
      "nama" => "Wayan Alex",
      "username" => "wayanalex",
      "password" => "wayanalex",
    ],
    [
      "nik" => 3
    ]
  ); 

  var_dump($masyarakat);

?>