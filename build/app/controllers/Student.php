<?php

class Student extends Controller
{
  public function index()
  {
    if (!Auth::logged_in()) {
      redirect('login');
    }

    $this->view('student/dashboard');
  }

  public function request()
  {
    if (!Auth::logged_in()) {
      redirect('login');
    }

    $this->view('student/request');
  }

  public function track()
  {
    if (!Auth::logged_in()) {
      redirect('login');
    }

    $this->view('student/track');
  }

  public function payment()
  {
    if (!Auth::logged_in()) {
      redirect('login');
    }

    $this->view('student/payment');
  }

  public function history()
  {
    if (!Auth::logged_in()) {
      redirect('login');
    }

    $this->view('student/history');
  }

  public function setting()
  {
    if (!Auth::logged_in()) {
      redirect('login');
    }

    $this->view('student/setting');
  }
}