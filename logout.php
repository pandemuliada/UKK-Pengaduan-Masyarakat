<?php 
  include_once 'init.php';

  if ($Auth->logout()) {
    redirect("/");
  }


  
