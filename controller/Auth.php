<?php

  class Auth extends Database
  {
    public function set_current_user($user)
    {
      $_SESSION['current_user'] = $user;
    }

    public function current_user()
    {
      if (isset($_SESSION['current_user'])) {
        return $_SESSION['current_user'];
      }
    }

    public function logout()
    {
      unset($_SESSION['current_user']);
      if (!isset($_SESSION['current_user'])) {
        return true;
      }
    }
  }
  