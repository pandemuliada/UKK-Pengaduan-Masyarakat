<?php
  
  function url($url = "")
  {
    $server = explode("/", $_SERVER['REQUEST_URI']);
    return "http://" . $_SERVER["SERVER_NAME"] . "/" . $server[1] . $url;
  }

  function redirect($url)
  {
    return header("Location: " . url($url));
    exit();
  }