<?php 
  include_once 'init.php';

  if (isset($_POST["login"])) {
    // If data valid
    if ( !empty($_POST['username']) || !empty($_POST['password']) ) {
    
      $username = $_POST['username'];
      $password = md5( $_POST['password']);

      $login_user = Masyarakat::first("WHERE username = '$username' AND password = '$password'");
      
      // Set current user
      $Auth->set_current_user($login_user);
      
      // Redirect to home if login success
      if ($Auth->current_user()) {
        header("Location: home.php");
      }

    } else {
      echo "Tolong masukan data yang valid";
    }
  }
  
  // Redirect back to homepage if ser already logged in
  if ($Auth->current_user()) header("Location: home.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Masyarakat</title>
</head>
<body>
  
  <div>
    <form action="" method="POST">
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
      
      <button type="submit" name="login">Login</button>
    </form>
  </div>

</body>
</html>