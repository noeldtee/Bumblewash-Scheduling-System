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
  
      $this->view('settings/passwordedit');
  }
  
}