<?php

class Settings extends Controller
{
  public function index()
  {
    if (!Auth::logged_in()) {
      redirect('login');
    }

    $this->view('settings/useredit');
  }
  public function passwordedit()
  {
      if (!Auth::logged_in()) {
          redirect('login');
      }
  
      $errors = [];
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $currentPassword = $_POST['current_password'] ?? '';
          $newPassword = $_POST['new_password'] ?? '';
          $confirmPassword = $_POST['confirm_password'] ?? '';
  
          $userId = $_SESSION['USER']->student_id; // Assuming you store the user ID in session
          $userModel = new User(); // Your user model
  
          // Validate current password
          if (!$userModel->verifyPassword($userId, $currentPassword)) {
              $errors[] = "Current password is incorrect.";
          }
  
          // Validate new password
          if ($newPassword !== $confirmPassword) {
              $errors[] = "New passwords do not match.";
          } elseif (strlen($newPassword) < 8) {
              $errors[] = "Password must be at least 8 characters long.";
          }
  
          // If no errors, update the password
          if (empty($errors)) {
              $userModel->updatePassword($userId, $newPassword);
              $_SESSION['SUCCESS_MESSAGE'] = "Password updated successfully.";
              redirect('settings');
          }
      }
  
      // Pass errors to the view
      $this->view('settings/passwordedit', ['errors' => $errors]);
  }
  
}