<?php 
  include_once 'init.php';
  $logout = $Auth->logout();

  if ($logout) {
    header("Location: index.php");
  }
  session_destroy();

  
