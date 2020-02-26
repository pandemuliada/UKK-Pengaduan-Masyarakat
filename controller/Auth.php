<?php

  class Auth extends Database
  {
    public function set_current_user($user)
    {
      if (session_status() == PHP_SESSION_NONE) session_start();
      $_SESSION['current_user'] = $user;
    }

    public function current_user()
    {
      if (session_status() == PHP_SESSION_NONE) session_start();

      if (isset($_SESSION['current_user'])) {
        return $_SESSION['current_user'];
      }
    }

    public function set_login_status($bool_status)
    {
      if (session_status() == PHP_SESSION_NONE) session_start();
      $_SESSION['is_login'] = $bool_status;
    }

    public function is_login()
    {
      if (session_status() == PHP_SESSION_NONE) session_start();

      if (isset($_SESSION['is_login'])) {
        return $_SESSION['is_login'];
      }
    }

    public function logout()
    {
      if (session_status() == PHP_SESSION_NONE) session_start();
      unset($_SESSION['current_user']);
      unset($_SESSION['is_login']);
      session_destroy();
      
      if (!isset($_SESSION['current_user']) && !isset($_SESSION['is_login'])) {
        return true;
      } else {
        return false;
      }
    }
  }
  