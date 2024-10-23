<?php

class Auth
{
  public static function authenticate($row)
  {
    $_SESSION['USER'] = $row;
  }

  public static function logout()
  {
    unset($_SESSION['USER']);
  }

  public static function logged_in()
  {
    return isset($_SESSION['USER']);
  }
}