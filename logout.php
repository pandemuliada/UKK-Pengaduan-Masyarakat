<?php 
  include_once 'init.php';
  $logout = $Auth->logout();

  if ($logout) {
    header("Location: login.php");
  }
  session_destroy();

  
