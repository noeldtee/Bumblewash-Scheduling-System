<?php
//Import PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class Admins extends Controller
{

  public function index()
  {
    if (!Admin_Auth::logged_in()) {
      redirect('admins/login');
    }

      $db = new Database();
      $conn = $db->connect();

      // Fetch total students
      $totalStudentsQuery = "SELECT COUNT(*) AS total_students FROM users";
      $stmt = $conn->prepare($totalStudentsQuery);
      $stmt->execute();
      $totalStudents = $stmt->fetch(PDO::FETCH_OBJ);

      // Fetch total requests
      $totalRequestsQuery = "SELECT COUNT(*) AS total_requests FROM books";
      $stmt = $conn->prepare($totalRequestsQuery);
      $stmt->execute();
      $totalRequests = $stmt->fetch(PDO::FETCH_OBJ);

      // Fetch total pending requests
      $totalPendingQuery = "SELECT COUNT(*) AS total_pending FROM books WHERE book_status = 'pending'";
      $stmt = $conn->prepare($totalPendingQuery);
      $stmt->execute();
      $totalPending = $stmt->fetch(PDO::FETCH_OBJ);

      // Fetch total in-process requests
      $totalInProcessQuery = "SELECT COUNT(*) AS total_in_process FROM books WHERE book_status = 'in process'";
      $stmt = $conn->prepare($totalInProcessQuery);
      $stmt->execute();
      $totalInProcess = $stmt->fetch(PDO::FETCH_OBJ);

      // Fetch total ready to pick up
      $readyToPickupQuery = "SELECT COUNT(*) AS ready_to_pickup FROM books WHERE book_status = 'to pickup'";
      $stmt = $conn->prepare($readyToPickupQuery);
      $stmt->execute();
      $readyToPickup = $stmt->fetch(PDO::FETCH_OBJ);

      // Fetch recent activities
      $recentActivityQuery = "SELECT * FROM books ORDER BY created_at DESC LIMIT 5";
      $stmt = $conn->prepare($recentActivityQuery);
      $stmt->execute();
      $recentActivities = $stmt->fetchAll(PDO::FETCH_OBJ);

      // Pass data to the view
      $this->view('admins/dashboard', [
          'totalStudents' => $totalStudents->total_students,
          'totalRequests' => $totalRequests->total_requests,
          'totalPending' => $totalPending->total_pending,
          'totalInProcess' => $totalInProcess->total_in_process,
          'readyToPickup' => $readyToPickup->ready_to_pickup,
          'recentActivities' => $recentActivities,
      ]);
  }

  public function login()
  {
      $errors = [];
      $admin = new Admin();
      $showSuccessModal = false;  // Initialize flag
  
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          if (isset($_POST['admin_name']) && isset($_POST['admin_password'])) {
              $arr['admin_name'] = $_POST['admin_name'];
  
              $row = $admin->first($arr);  // Retrieve the admin data by username
  
              if ($row) {
                  // Check if the password matches
                  if (password_verify($_POST['admin_password'], $row->admin_password)) {
                      Admin_Auth::authenticate($row); // Authenticate admin
                      // Set flag to true to show modal on successful login
                      $showSuccessModal = true;
                      // Do not redirect immediately
                  } else {
                      $errors[] = 'Invalid Username or Password'; // Incorrect password
                  }
              } else {
                  $errors[] = 'Invalid Username or Password'; // Username not found
              }
          } else {
              $errors[] = 'Please enter both username and password'; // Missing fields
          }
      }
  
      // Pass errors to the view and the success flag for modal
      $this->view('admins/login', [
          'errors' => $errors,
          'showSuccessModal' => $showSuccessModal
      ]);
  }

  public function user_list()
  {
    if (!Admin_Auth::logged_in()) {
      redirect('admins/login');
    }

    $userModel = new User();

    if (isset($_GET['search']) && !empty($_GET['search'])) {

        $searchQuery = $_GET['search'];

        $searchResults = $userModel->search('student_firstname', $searchQuery);

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
    if (!Admin_Auth::logged_in()) {
      redirect('admins/login');
    }

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

  public function booking_list()
{
    if (!Admin_Auth::logged_in()) {
        redirect('admins/login');
    }

    $bookModel = new Book();

    // Initialize filters
    $searchQuery = $_GET['search'] ?? '';
    $filterDate = $_GET['filter_date'] ?? '';
    $filterStatus = $_GET['filter_status'] ?? '';

    // Build the base condition to exclude completed requests
    $conditions = ["book_status != 'Completed'"];
    $params = [];

    // Apply search filter
    if (!empty($searchQuery)) {
        $conditions[] = "(book_fname LIKE :search OR student_id LIKE :search)";
        $params[':search'] = '%' . $searchQuery . '%';
    }

    // Apply date filter
    if (!empty($filterDate)) {
        $conditions[] = "DATE(created_at) = :filter_date";
        $params[':filter_date'] = $filterDate;
    }

    // Apply status filter
    if (!empty($filterStatus)) {
        $conditions[] = "book_status = :filter_status";
        $params[':filter_status'] = $filterStatus;
    }

    // Combine all conditions
    $whereClause = implode(' AND ', $conditions);

    // Fetch filtered results
    $filteredResults = $bookModel->findWhere($whereClause, $params);

    // Pass data to the view
    $this->view('admins/booking_list', [
        'books' => $filteredResults
    ]);
}


public function request_logs()
{
    if (!Admin_Auth::logged_in()) {
        redirect('admins/login');
    }

    $bookModel = new Book();

    // Initialize filters
    $searchQuery = $_GET['search'] ?? '';
    $filterDate = $_GET['filter_date'] ?? '';
    $filterStatus = $_GET['filter_status'] ?? '';

    // Build the base condition to include only Rejected and Completed requests
    $conditions = ["book_status IN ('Completed', 'Rejected')"];
    $params = [];

    // Apply search filter
    if (!empty($searchQuery)) {
        $conditions[] = "(book_fname LIKE :search OR student_id LIKE :search)";
        $params[':search'] = '%' . $searchQuery . '%';
    }

    // Apply date filter
    if (!empty($filterDate)) {
        $conditions[] = "DATE(created_at) = :filter_date";
        $params[':filter_date'] = $filterDate;
    }

    // Apply status filter (optional, within Rejected and Completed)
    if (!empty($filterStatus)) {
        $conditions[] = "book_status = :filter_status";
        $params[':filter_status'] = $filterStatus;
    }

    // Combine all conditions
    $whereClause = implode(' AND ', $conditions);

    // Fetch filtered results
    $filteredResults = $bookModel->findWhere($whereClause, $params);

    // Pass data to the view
    $this->view('admins/request_logs', [
        'books' => $filteredResults
    ]);
}


  public function booking_edit($id)
  {
    if (!Admin_Auth::logged_in()) {
      redirect('admins/login');
    }

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
    if (!Admin_Auth::logged_in()) {
      redirect('admins/login');
    }

  
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
    if (!Admin_Auth::logged_in()) {
      redirect('admins/login');
    }


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
    if (!Admin_Auth::logged_in()) {
      redirect('admins/login');
    }

  
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
    if (!Admin_Auth::logged_in()) {
      redirect('admins/login');
    }

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
    if (!Admin_Auth::logged_in()) {
      redirect('admins/login');
    }

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
    if (!Admin_Auth::logged_in()) {
      redirect('admins/login');
    }

    $serviceModel = new Service();

    if (isset($_GET['search']) && !empty($_GET['search'])) {

        $searchQuery = $_GET['search'];

        $searchResults = $serviceModel->search('document', $searchQuery);

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
  if (!Admin_Auth::logged_in()) {
    redirect('admins/login');
  }

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
    if (!Admin_Auth::logged_in()) {
      redirect('admins/login');
    }


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
    if (!Admin_Auth::logged_in()) {
      redirect('admins/login');
    }


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
  public function updateStatus()
  {
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $id = $_POST['id'] ?? null;
          $action = $_POST['action'] ?? null;

          if ($id && $action) {
              $bookModel = new Book();
              $book = $bookModel->find($id); // This now works correctly.

              if ($book) {
                  $newStatus = '';
                  switch ($action) {
                      case 'approve':
                          $newStatus = 'in process';
                          break;
                      case 'to pickup':
                          $newStatus = 'to pickup';
                          break;
                      case 'completed':
                          $newStatus = 'completed';
                          break;
                      default:
                          redirect('admins/booking_list', ['error' => 'Invalid status action.']);
                  }

                  // Update the status
                  $bookModel->updateStatus($id, $newStatus);

                  // Send email notification
                  $this->sendEmailNotification($book->book_email, $newStatus);

                  redirect('admins/booking_list', ['success' => 'Status updated successfully.']);
              }
          }

          redirect('admins/booking_list', ['error' => 'Failed to update status.']);
      }
  }

  public function deleteRequest($id)
  {
      // Ensure the ID is valid
      if (!is_numeric($id)) {
          $_SESSION['error'] = "Invalid request.";
          header("Location: " . ROOT . "/admins/dashboard");
          return;
      }

      // Execute deletion logic
      $db = new Database();
      $query = "DELETE FROM books WHERE id = :id";
      $db->query($query, ['id' => $id]);

      // Redirect back to the dashboard
      $_SESSION['success'] = "Request successfully deleted.";
      header("Location: " . ROOT . "/admins/dashboard");
  }

  private function sendEmailNotification($studentEmail, $statusUpdate)
    {
        // Create a new PHPMailer instance
        $mail = new PHPMailer;
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'smartdocumentrequest@gmail.com';             // SMTP username
        $mail->Password = '@smartdocument1';               // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom('smartdocumentrequest@gmail.com', 'SmartDocument Request');
        $mail->addAddress($studentEmail);                      // Add a recipient

        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Document Request Status Update';
        $mail->Body    = "Your document request status has been updated to: {$statusUpdate}.";

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    }

  public function paymentdashboard()
  {
    if (!Admin_Auth::logged_in()) {
      redirect('admins/login');
    }

      $this->view('admins/paymentdashboard', [
      ]);
  }

  public function unauthorized()
{
    $this->view('admins/unauthorized');
}
}