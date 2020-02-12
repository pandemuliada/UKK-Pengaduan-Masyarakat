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

    public function logout()
    {
      if (session_status() == PHP_SESSION_NONE) session_start();
      unset($_SESSION['current_user']);
      if (!isset($_SESSION['current_user'])) {
        return true;
      }
    }
  }
  