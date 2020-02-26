<?php 
  include_once "init.php";

  if (isset($_POST['login'])) {
    // If data valid
    if ( !empty($_POST['username']) || !empty($_POST['password']) ) {

      $username = $_POST['username'];
      $password = md5( $_POST['password']);
      $level = $_POST['level'];

      $login_user = Petugas::first("WHERE username = '$username' AND password = '$password' AND level = '$level'");
      
      // Set current user
      if ($login_user) {
        $Auth->set_current_user($login_user);
        $Auth->set_login_status(true);
      } else {
        echo "Login gagal, masukan data yang valid";
      }
      
      // Redirect to home if login success
      if ($Auth->current_user()) {
        header("Location: dashboard");
      }
    } else {
      echo "Tolong masukan data yang valid";
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
  <title>Login Petugas</title>
</head>
<body>

  <h1>Login Petugas</h1>
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
      <div>
        <label for="">Level</label>
        <br>
        <select name="level">
          <option value="admin">Admin</option>
          <option value="petugas">Petugas</option>
        </select>
      </div>
      <br>
      <button type="submit" name="login">Login</button>
    </form>
  </div>
</body>
</html>