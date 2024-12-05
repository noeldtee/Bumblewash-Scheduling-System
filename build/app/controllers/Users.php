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


    public function edit($id)
    {
        if (!Auth::logged_in()) {
            redirect('login');
        }

        $user = new User();
        $row = $user->first(['studentid' => $id]);

        if (!$row) {
            redirect('users'); // Redirect if user not found
        }

        $errors = [];

        if (count($_POST) > 0) {
            if ($user->validate($_POST)) {
                // Handle profile image upload
                if (isset($_FILES['student_profile']) && $_FILES['student_profile']['error'] == 0) {
                    $allowed = ['image/png', 'image/jpeg'];
                    if (in_array($_FILES['student_profile']['type'], $allowed)) {
                        $folder = 'assets/images/';

                        if (!file_exists($folder)) {
                            mkdir($folder, 0777, true);
                        }

                        // Sanitize and generate unique file name
                        $fileName = time() . '_' . basename($_FILES['student_profile']['name']);
                        $destination = $folder . $fileName;
                        move_uploaded_file($_FILES['student_profile']['tmp_name'], $destination);
                        $_POST['student_profile'] = $destination;
                    }
                }

                $user->update($id, $_POST);

                redirect('users');
            } else {
                $errors = $user->errors;
            }
        }

        $this->view('users/edit', [
            'user' => $row,
            'errors' => $errors
        ]);
    }

    public function delete($id)
    {
        if (!Auth::logged_in()) {
            redirect('login');
        }

        $user = new User();
        $row = $user->first(['studentid' => $id]);

        if (!$row) {
            redirect('users'); // Redirect if user not found
        }

        if (count($_POST) > 0) {
            $user->delete($id);

            redirect('users');
        }

        $this->view('users/delete', [
            'user' => $row
        ]);
    }
}