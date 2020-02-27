<?php 
  include_once 'init.php';

  if (isset($_POST["login"])) {
    // If data valid
    if ( !empty($_POST['username']) && !empty($_POST['password']) ) {
    
      $username = $_POST['username'];
      $password = md5( $_POST['password']);

      $login_user = Masyarakat::first("WHERE username = '$username' AND password = '$password'");
      
      // Set current user
      if ($login_user) {
        $Auth->set_current_user($login_user);
        $Auth->set_login_status(true);
      } else {
        $error = "Data yang dimasukan tidak valid!";
      }
      
      // Redirect to home if login success
      if ($Auth->current_user()) {
        redirect("home.php");
      }
    } else {
      $error = "Data yang dimasukan tidak valid!";
    }
  }

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
  <title>Login Masyarakat</title>
  <link rel="stylesheet" href="<?= url('/assets/css/index.css') ?>">
</head>
<body>
  
  <div style="width: 400px; margin: 0 auto">
    <div style="margin: 20px 0; color: red"><?= $error??null ?></div>
    <form action="" method="POST">
      <div class='field-wrapper'>
        <label class='label' for="">Username</label>
        <input class='input' type="text" name="username">
      </div>
      
      <div class='field-wrapper'>
        <label class='label' for="">Password</label>
        <input class='input' type="password" name="password">
      </div>
      
      <button class='button-primary block' type="submit" name="login">L O G I N</button>
    </form>
  </div>

</body>
</html>