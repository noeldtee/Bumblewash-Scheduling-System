<?php

class Track extends Controller
{
    public function index()
    {
        if (!Auth::logged_in()) {
            redirect('login');
        }

        $user_id = $_SESSION['USER']->student_id; // Logged-in user's ID
        $db = new Database();
        $conn = $db->connect();

        $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

        // Prepare the base SQL query
        $sql = "SELECT book_document, created_at, book_status, pickup_date, payment_status, 
        book_fname, book_lname, book_email, book_number, 
        student_birthdate, student_id, year_level, course, section, 
        price, purpose
        FROM books 
            WHERE student_id = :student_id";

        // If a search term is provided, append a WHERE condition
        if (!empty($searchQuery)) {
            $sql .= " AND (book_document LIKE :search OR book_status LIKE :search)";
        }

        // Add the ordering clause
        $sql .= " ORDER BY created_at DESC";

        // Prepare and execute the statement
        $stmt = $conn->prepare($sql);
        $params = ['student_id' => $user_id];
        if (!empty($searchQuery)) {
            $params['search'] = '%' . $searchQuery . '%';
        }
        $stmt->execute($params);

        $documentRequests = $stmt->fetchAll(PDO::FETCH_OBJ);

        // Pass data to the view
        $this->view('track', [
            'documentRequests' => $documentRequests,
            'searchQuery' => $searchQuery // Pass the current search query for the UI
        ]);
    }
}
