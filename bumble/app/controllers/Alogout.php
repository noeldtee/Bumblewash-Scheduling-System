<?php

class Alogout extends Controller
{
    public function index()
    {
        Admin_Auth::logout();
        redirect('admins/login');
    }
}