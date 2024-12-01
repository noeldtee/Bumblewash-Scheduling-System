<?php

class Admin_Auth
{
  public static function authenticate($row)
  {
    $_SESSION['ADMIN'] = $row;
  }

  public static function logout()
  {
    if (isset($_SESSION['ADMIN'])) {
      unset($_SESSION['ADMIN']);
    }
  }

  public static function logged_in()
  {
    if (isset($_SESSION['ADMIN'])) {
      return true;
    }
    return false;
  }
  
}