<?php

class Books extends Controller
{
  public function index()
  {
      if (!Auth::logged_in()) {
          redirect('login');
      }
  
      $errors = [];
      $book = new Book();
  
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          if ($book->validate($_POST)) {
              $book->insert($_POST);
              redirect('home');
          } else {
              $errors = $book->errors;
          }
      }
      $this->view('books/booking', [
          'errors' => $errors
      ]);
  }
  public function getPrice()
    {
        $service = $_GET['service'];
        $vehicle = $_GET['vehicle'];

        $db = new Database();
        $connection = $db->connect();

        $query = "SELECT price FROM services WHERE service = :service AND vehicle = :vehicle";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':service', $service);
        $stmt->bindParam(':vehicle', $vehicle);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            echo $result['price'];
        } else {

        }
    }
}