<?php

class Contact extends Controller
{
  public function index()
  {
      if (!Auth::logged_in()) {
          redirect('login');
      }
  
      $errors = [];
      $message = new Message();
  
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          if ($message->validate($_POST)) {
              $message->insert($_POST);
              redirect('home');
          } else {
              $errors = $message->errors;
          }
      }
  
      $this->view('contact', [
          'errors' => $errors
      ]);
  }
}