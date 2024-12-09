<?php

class Users extends Controller
{
    public function index()
    {
        if (!Auth::logged_in()) {
            redirect('login');
        }

        $user = new User();
        $rows = $user->findAll();

        $this->view('users/index', [
            'users' => $rows
        ]);
    }

    public function create()
    {
    $errors = [];
    $user = new User();
    $showSuccessModal = false;

    if (count($_POST) > 0) {

      if ($user->validate($_POST)) {

        if (count($_FILES) > 0) {

          $allowed[] = 'image/png';
          $allowed[] = 'image/jpeg';

          if ($_FILES['image']['error'] == 0 && in_array($_FILES['image']['type'], $allowed)) {

            $folder = 'assets/images/';

            if (!file_exists($folder)) {
              mkdir($folder, 0777, true);
            }

            $destination = $folder . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $destination);
            $_POST['image'] = $destination;
          }
        }

        $_POST['student_password'] = password_hash($_POST['student_password'], PASSWORD_DEFAULT);
        $_POST['token'] = random_string(60);

        $user->insert($_POST);

        $showSuccessModal = true;
        } else {
            $errors = $user->errors;
        }
    }
    $this->view('users/create', [
        'errors' => $errors,
        'showSuccessModal' => $showSuccessModal,
    ]);
  }

  public function student()
  { 
    $this->view('users/student');
  }
  public function admin()
  { 
    $this->view('users/admin');
  }
}