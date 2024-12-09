<?php

class Admins extends Controller
{

  public function index()
  {
    $this->view('admins/dashboard');
  }

  public function login()
  {
    $errors = [];
    $admin = new Admin();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = trim($_POST['admin_name'] ?? '');
        $password = trim($_POST['admin_password'] ?? '');

        // Validation
        if (!filter_var($name)) {
            $errors['admin_name'] = 'Please enter a valid username.';
        }
        if (empty($password)) {
            $errors['admin_password'] = 'Password is required.';
        }

        if (empty($errors)) {
            // Check if user exists
            $row = $admin->first(['admin_name' => $name]);

            if ($row) {
                if (password_verify($password, $row->admin_password)) {
                    Auth::authenticate($row);
                    $_SESSION['success'] = 'Login successful! Welcome back!';
                    
                    // Render the login view with success flag
                    $this->view('admins/login', [
                        'errors' => $errors,
                        'showSuccessModal' => true
                    ]); 
                } else {
                    $errors['admins/login'] = 'Email or Password is invalid.';
                }
            } else {
                $errors['admins/login'] = 'Email or Password is invalid.';
            }
        }
    }

    // Pass errors to the view
    $this->view('admins/login', [
        'errors' => $errors
    ]);
  }
}