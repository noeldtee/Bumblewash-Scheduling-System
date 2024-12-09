<?php

class Admins extends Controller
{

  public function index()
  {

    $this->view('admins/dashboard');
  }
  public function login()
  {
    $errors = [];
    $admin = new Admin();
  
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if (isset($_POST['admin_name'])) {
        $arr['admin_name'] = $_POST['admin_name'];
  
        $row = $admin->first($arr);
  
        if ($row) {
        if (password_verify($_POST['admin_password'], $row->admin_password)) {
          Admin_Auth::authenticate($row);
          redirect('admins/dashboard');
        } else {
          $errors['errors'] = 'Email or Password is invalid';
        }
        } else {
          $errors['errors'] = 'Email or Password is invalid';
        }
        } else {
          $errors['errors'] = 'Email or Password is invalid';
        }
    }
      $this->view('admins/login', 
      ['errors' => $errors]);
  }
  public function user_list()
  {

    $userModel = new User();

    if (isset($_GET['search']) && !empty($_GET['search'])) {

        $searchQuery = $_GET['search'];

        $searchResults = $userModel->search('username', $searchQuery);

        $this->view('admins/user_list', [
            'users' => $searchResults
        ]);
    } else {
        $allUsers = $userModel->findAll();

        $this->view('admins/user_list', [
            'users' => $allUsers
        ]);
    }
  }
  public function user_delete($id)
  {
    $x = new User();
    $arr['id'] = $id;
    $row = $x->first($arr);
  
    if (count($_POST) > 0) {
  
    $x->delete($id);
  
    redirect('admins');
    }
  
    $this->view('admins/user_delete', [
    'user' => $row
    ]);
  }
  public function message_list()
  {

    $messageModel = new Message();

    if (isset($_GET['search']) && !empty($_GET['search'])) {

        $searchQuery = $_GET['search'];

        $searchResults = $messageModel->search('username', $searchQuery);

        $this->view('admins/message_list', [
            'messages' => $searchResults
        ]);
    } else {
        $allMessages = $messageModel->findAll();

        $this->view('admins/message_list', [
            'messages' => $allMessages
        ]);
    }
  }
  public function message_delete($id)
  {
  
    $x = new Message();
    $arr['id'] = $id;
    $row = $x->first($arr);
  
    if (count($_POST) > 0) {
  
    $x->delete($id);
  
    redirect('admins');
    }
  
    $this->view('admins/message_delete', [
    'message' => $row
    ]);
  }
  public function booking_list()
  {
 

    $bookModel = new Book();

    if (isset($_GET['search']) && !empty($_GET['search'])) {

        $searchQuery = $_GET['search'];

        $searchResults = $bookModel->search('book_name', $searchQuery);

        $this->view('admins/booking_list', [
            'books' => $searchResults
        ]);
    } else {
        $allBooks = $bookModel->findAll();

        $this->view('admins/booking_list', [
            'books' => $allBooks
        ]);
    }
  }
  public function booking_edit($id)
  {


  $x = new Book();
  $arr['id'] = $id;
  $row = $x->first($arr);

  if (count($_POST) > 0) {

    $x->update($id, $_POST);

    redirect('admins/booking_list');
  }
  $this->view('admins/booking_edit', [
    'book' => $row
  ]);
  }
  public function booking_delete($id)
  {

  
    $x = new Book();
    $arr['id'] = $id;
    $row = $x->first($arr);
  
    if (count($_POST) > 0) {
  
    $x->delete($id);
  
    redirect('admins/booking_list');
    }
  
    $this->view('admins/booking_delete', [
    'book' => $row
    ]);
  }
  public function admin_list()
  {


    $adminModel = new Admin();

    if (isset($_GET['search']) && !empty($_GET['search'])) {

        $searchQuery = $_GET['search'];

        $searchResults = $adminModel->search('admin_name', $searchQuery);

        $this->view('admins/admin_list', [
            'admins' => $searchResults
        ]);
    } else {
        $allAdmins = $adminModel->findAll();

        $this->view('admins/admin_list', [
            'admins' => $allAdmins
        ]);
    }
  }
  public function admin_create()
  {

  
    $errors = [];
    $admin = new Admin();
  
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      if ($admin->validate($_POST)) {

        $_POST['admin_password'] = password_hash($_POST['admin_password'], PASSWORD_DEFAULT);

        $_POST['admin_token'] = random_string(60);

        $admin->insert($_POST);

        redirect('admins');
      } else {
      $errors = $admin->errors;
      }
    }

    $this->view('admins/admin_create', 
    ['errors' => $errors]);
  }
  public function admin_edit($id)
  {

  $x = new Admin();
  $arr['id'] = $id;
  $row = $x->first($arr);

  if (count($_POST) > 0) {

    $x->update($id, $_POST);

    redirect('admins');
  }

  $this->view('admins/admin_edit', [
  'admin' => $row
  ]);
  }
  public function admin_delete($id)
  {

    $x = new Admin();
    $arr['id'] = $id;
    $row = $x->first($arr);
  
    if (count($_POST) > 0) {
  
    $x->delete($id);
  
    redirect('admins');
    }
  
    $this->view('admins/admin_delete', [
    'admin' => $row
    ]);
  }
  public function service()
  {

    $serviceModel = new Service();

    if (isset($_GET['search']) && !empty($_GET['search'])) {

        $searchQuery = $_GET['search'];

        $searchResults = $serviceModel->search('service', $searchQuery);

        $this->view('admins/service', [
            'services' => $searchResults
        ]);
    } else {
        $allServices = $serviceModel->findAll();

        $this->view('admins/service', [
            'services' => $allServices
        ]);
    }
  }
  
  public function service_add()
  {

  
      $errors = [];
      $service = new Service();
  
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if ($service->validate($_POST)) {

          $_POST['service_token'] = random_string(60);

          $service->insert($_POST);

          redirect('admins/service');
        } else {
        $errors = $service->errors;
        }
      }
    $this->view('admins/service_add', 
    ['errors' => $errors]);
  }

  public function service_edit($id)
  {


  $x = new Service();
  $arr['id'] = $id;
  $row = $x->first($arr);

  if (count($_POST) > 0) {

    $x->update($id, $_POST);

    redirect('admins/service');
  }
  $this->view('admins/service_edit', [
    'service' => $row
  ]);
  }

  public function service_delete($id)
  {


    $x = new Service();
    $arr['id'] = $id;
    $row = $x->first($arr);

    if (count($_POST) > 0) {

      $x->delete($id);

      redirect('admins/services');
    }

    $this->view('admins/service_delete', [
      'service' => $row
    ]);
  }
}