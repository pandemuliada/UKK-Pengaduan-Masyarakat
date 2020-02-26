<?php 
  include_once 'init.php';

  // Check login status
  if ($Auth->is_login()) {
    // If current user has level property (admin, petugas), redirect to dashboard page
    // Else (masyarakat), redirect to homepage 
    if (isset($Auth->current_user()->level)) {
      redirect("/dashboard/index.php");
    } else if (!isset($Auth->current_user()->level)){
      redirect("/home.php");
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pengaduan Masyarakat</title>
  <link rel="stylesheet" href="<?= url('/assets/css/index.css') ?>">
  
  <style>
    #landingPage {
      background-color: red;
      background-image: url("./assets/image/landing-bg.jpg");
      background-size: cover;
      height: 100vh;
    }
    #overlay {
      background: rgba(0,0,0,.5);
      height: inherit;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }
  </style>

</head>
<body>
  
  <div id="landingPage">
    <div id='overlay'>
      <h1 class='title-1' style="color: white">Pengaduan Masyarakat</h1>
      <br>
      <div>
        <a class='button-primary' style="margin-right: 5px" href="login.php">Login Masyarakat</a>
        <a class='button-primary' style="margin-left: 5px" href="login-petugas.php">Login Petugas</a>
      </div>
    </div>
  </div>


</body>
</html>