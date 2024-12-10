<?php

class Books extends Controller
{
    public function index()
    {
        if (!Auth::logged_in()) {
            redirect('login');
        }

        $errors = [];
        $showSuccessModal = false;
        $showErrorModal = false;
        $errorMessage = ''; 

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $book = new Book();

            if ($book->validate($_POST)) {
                // Consolidate all data into a single array
                $data = [
                    'student_id' => $_POST['student_id'] ?? null,
                    'book_fname' => $_POST['book_fname'] ?? null,
                    'book_lname' => $_POST['book_lname'] ?? null,
                    'book_email' => $_POST['book_email'] ?? null,
                    'book_number' => $_POST['book_number'] ?? null,
                    'student_birthdate' => $_POST['student_birthdate'] ?? null,
                    'course' => $_POST['course'] ?? null,
                    'section' => $_POST['section'] ?? null,
                    'year_level' => $_POST['year_level'] ?? null,
                    'purpose' => $_POST['purpose'] ?? null,
                    'book_document' => implode(',', $_POST['book_document'] ?? []),
                    'price' => array_sum($_POST['price'] ?? []),
                    'book_status' => 'pending'  // Initial request status
                ];

                // Attempt to insert the data into the database
                if ($book->insert($data)) {
                    // Data insertion successful, show success modal
                    $showSuccessModal = true;
                } else {
                    // Data insertion failed, set error message and show error modal
                    $showSuccessModal = true;
                }

            } else {
                // Form validation failed
                $errors = $book->errors;
                $showErrorModal = true;
                $errorMessage = 'There are errors in your form submission. Please correct them.';
            }
        }

        $this->view('books/request', [
            'errors' => $errors,
            'showSuccessModal' => $showSuccessModal,
            'showErrorModal' => $showErrorModal,
            'errorMessage' => $errorMessage // Pass this to the view for the error modal
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
