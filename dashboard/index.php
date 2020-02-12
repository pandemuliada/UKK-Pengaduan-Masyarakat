<!DOCTYPE html>
<?php 
  include_once "../init.php";
  
  if (!$Auth->current_user()) header("Location: ../index.php");

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Page</title>
</head>
<body>
  
  <h1>Ohayou <?= $Auth->current_user()->nama_petugas ?></h1>
  <p>Level anda adalah <?= ucfirst($Auth->current_user()->level) ?></p>

  <a href="../logout.php">Logout</a>


</body>
</html>