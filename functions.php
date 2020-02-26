<?php
  
  function url($url = "")
  {
    return "http://" . $_SERVER["SERVER_NAME"] . $url;
  }

  function redirect($url)
  {
    return header("Location: " . url($url));
  }