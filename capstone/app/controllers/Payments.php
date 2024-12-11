<?php

class Payments extends Controller
{
  public function index()
  {
    if (!Auth::logged_in()) {
      redirect('login');
    }

    $this->view('payments/payment');
  }

  public function manage()
  { 
    $this->view('payments/manage');
  }
  public function setting()
  { 
    $this->view('payments/setting');
  }
}