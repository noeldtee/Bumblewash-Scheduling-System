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
                redirect('dashboard');
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
        $document = $_GET['service']; // Ensure this matches the JavaScript query parameter

        $db = new Database();
        $connection = $db->connect();

        // Adjust the query to fetch price based only on the document
        $query = "SELECT price FROM services WHERE document = :document";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':document', $document);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            echo $result['price']; // Output the price directly
        } else {
            echo "Price not found"; // Handle case where price is not found
        }
    }
}
