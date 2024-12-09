<?php

class Requests extends Controller
{
  public function index()
  {
      if (!Auth::logged_in()) {
          redirect('login');
      }
  
      $errors = [];
      $request = new Request();
  
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          if ($request->validate($_POST)) {
              $request->insert($_POST);
              redirect('Dashboard');
          } else {
              $errors = $request->errors;
          }
      }
      $this->view('requests/request', [
          'errors' => $errors
      ]);
  }

  public function create()
  {
    if (!Auth::logged_in()) {
      redirect('login');
    }

    $this->view('requests/create');
  }

  public function list()
  { 
    $this->view('requests/list');
  }
  public function pending()
  { 
    $this->view('requests/pending');
  }
  public function inprocess()
  { 
    $this->view('requests/inprocess');
  }
  public function completed()
  { 
    $this->view('requests/completed');
  }
  public function rejected()
  { 
    $this->view('requests/rejected');
  }
}