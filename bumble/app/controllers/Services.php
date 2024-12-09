<?php

class Services extends Controller {
        public function index()
        {
          if (!Auth::logged_in()) {
            redirect('login');
          }
      
          $this->view('services/service');
        }
    public function car_wash() {
        if (!Auth::logged_in()) {
            redirect('login');
          }
        $this->view('services/car_wash');
    }

    public function under_wash() {
        if (!Auth::logged_in()) {
            redirect('login');
          }
      
        $this->view('services/under_wash');
    }

    public function interior() {
        if (!Auth::logged_in()) {
            redirect('login');
          }
      
        $this->view('services/interior');
    }

    public function exterior() {
        if (!Auth::logged_in()) {
            redirect('login');
          }
      
        $this->view('services/exterior');
    }

    public function liquid_wax() {
        if (!Auth::logged_in()) {
            redirect('login');
          }
      
        $this->view('services/liquid_wax');
    }

    public function cream_wax() {
        if (!Auth::logged_in()) {
            redirect('login');
          }
      
        $this->view('services/cream_wax');
    }
}
