<?php

class Admins extends Controller
{

  public function index()
  {
    $this->view('admins/dashboard');
  }
}