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
      $showErrorModal = false; // Flag for error modal
      $errorMessage = ''; // Message for the error modal
  
      if (count($_POST) > 0) {
          try {
              // Validate input data
              if ($user->validate($_POST)) {
                  // Check for duplicate student_id, student_number, and student_email before inserting
                  $existingUser = $user->findByStudentId($_POST['student_id']);
                  $existingEmail = $user->findByEmail($_POST['student_email']);
                  $existingStudentNumber = $user->findByStudentNumber($_POST['student_number']);
  
                  if ($existingUser) {
                      $errorMessage = "The Student ID is already registered.";
                      $showErrorModal = true;
                  } elseif ($existingEmail) {
                      $errorMessage = "The Student Email is already registered.";
                      $showErrorModal = true;
                  } elseif ($existingStudentNumber) {
                      $errorMessage = "The Student Number is already registered.";
                      $showErrorModal = true;
                  } else {
                      // Handle file upload if image is provided
                      if (count($_FILES) > 0) {
                          $allowed = ['image/png', 'image/jpeg'];
  
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
  
                      // Hash the password and generate a random token
                      $_POST['student_password'] = password_hash($_POST['student_password'], PASSWORD_DEFAULT);
                      $_POST['token'] = random_string(60);
  
                      // Attempt to insert the data
                      $user->insert($_POST);
                      $showSuccessModal = true; // Show success modal
                  }
              } else {
                  // Validation failed, set errors
                  $errors = $user->errors;
                  $errorMessage = implode("<br>", $errors); // Combine validation errors
                  $showErrorModal = true;
              }
          } catch (PDOException $e) {
              // Handle database errors
              if ($e->getCode() == 23000) { // Integrity constraint violation
                  // Check which field caused the duplicate error
                  if (strpos($e->getMessage(), 'student_id') !== false) {
                      $errorMessage = "The Student ID is already registered.";
                  } elseif (strpos($e->getMessage(), 'student_number') !== false) {
                      $errorMessage = "The Student Number is already registered.";
                  } elseif (strpos($e->getMessage(), 'student_email') !== false) {
                      $errorMessage = "The Student Email is already registered.";
                  } else {
                      $errorMessage = "A duplicate entry exists in the database.";
                  }
                  $showErrorModal = true; // Show error modal
              } else {
                  // Handle unexpected errors
                  $errorMessage = "An unexpected error occurred. Please try again.";
                  $showErrorModal = true;
              }
          }
      }
  
      // Render the view with necessary data
      $this->view('users/create', [
          'errors' => $errors,
          'showSuccessModal' => $showSuccessModal,
          'showErrorModal' => $showErrorModal,
          'errorMessage' => $errorMessage,
      ]);
  }



  public function edit($id)
  {
    if (!Auth::logged_in()) {
      redirect('login');
    }

    $x = new User();
    $arr['id'] = $id;
    $row = $x->first($arr);

    if (count($_POST) > 0) {

      $x->update($id, $_POST);

      redirect('users');
    }

    $this->view('users/edit', [
      'user' => $row
    ]);
  }

  public function delete($id)
  {
    if (!Auth::logged_in()) {
      redirect('login');
    }

    $x = new User();
    $arr['id'] = $id;
    $row = $x->first($arr);

    if (count($_POST) > 0) {

      $x->delete($id);

      redirect('users');
    }

    $this->view('users/delete', [
      'user' => $row
    ]);
  }
}
