<?php

class Login extends Controller
{
  public function index()
  {
    $errors = [];
    $user = new User();

    if (count($_POST) > 0) {

      $arr['username'] = $_POST['username'];

      $row = $user->first($arr);

      if ($row) {

        if (password_verify($_POST['password'], $row->password)) {

          Auth::authenticate($row);

          redirect('home');
        } else {
          $errors['errors'] = 'Username or Password is invalid';
        }
      } else {
        $errors['errors'] = 'Username or Password is invalid';
      }
    }


    $this->view('login', [
      'errors' => $errors
    ]);
  }
}