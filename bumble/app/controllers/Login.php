<?php

class Login extends Controller
{
    public function index()
    {
        $errors = [];
        $user = new User();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['student_email'] ?? '');
            $password = trim($_POST['student_password'] ?? '');

            // Validation
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['student_email'] = 'Please enter a valid email address.';
            }
            if (empty($password)) {
                $errors['student_password'] = 'Password is required.';
            }

            if (empty($errors)) {
                // Check if user exists
                $row = $user->first(['student_email' => $email]);

                if ($row) {
                    if (password_verify($password, $row->student_password)) {
                        Auth::authenticate($row);
                        $_SESSION['success'] = 'Login successful! Welcome back!';
                        
                        // Render the login view with success flag
                        $this->view('login', [
                            'errors' => $errors,
                            'showSuccessModal' => true
                        ]); 
                    } else {
                        $errors['login'] = 'Email or Password is invalid.';
                    }
                } else {
                    $errors['login'] = 'Email or Password is invalid.';
                }
            }
        }

        // Pass errors to the view
        $this->view('login', [
            'errors' => $errors
        ]);
    }
}