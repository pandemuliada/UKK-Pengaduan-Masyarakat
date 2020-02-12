<?php 
  include_once 'init.php';
  session_start();

  $logout = $Auth->logout();

  if ($logout) {
    header("Location: login.php");
  }
  session_destroy();

  
