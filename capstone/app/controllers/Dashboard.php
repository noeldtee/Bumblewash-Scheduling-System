<?php

class Dashboard extends Controller
{
    public function index()
    {
        if (!Auth::logged_in()) {
            redirect('login');
        }

        $user_id = $_SESSION['USER']->student_id;
        $db = new Database();
        $conn = $db->connect();

        // Fetch total number of documents requested
        $totalRequestedQuery = "
            SELECT SUM(CHAR_LENGTH(book_document) - CHAR_LENGTH(REPLACE(book_document, ',', '')) + 1) AS total_requested 
            FROM books 
            WHERE student_id = :student_id";
        $stmt = $conn->prepare($totalRequestedQuery);
        $stmt->execute(['student_id' => $user_id]);
        $totalRequested = $stmt->fetch(PDO::FETCH_OBJ);

        // Fetch total pending documents
        $pendingQuery = "
        SELECT SUM(CHAR_LENGTH(book_document) - CHAR_LENGTH(REPLACE(book_document, ',', '')) + 1) AS total_pending 
        FROM books 
        WHERE student_id = :student_id AND book_status = 'pending'";

        $stmt = $conn->prepare($pendingQuery);
        $stmt->execute(['student_id' => $user_id]);
        $totalPending = $stmt->fetch(PDO::FETCH_OBJ);

        // Fetch recent activities
        $recentActivityQuery = "SELECT * FROM books WHERE student_id = :student_id ORDER BY created_at DESC LIMIT 5";
        $stmt = $conn->prepare($recentActivityQuery);
        $stmt->execute(['student_id' => $user_id]);
        $recentActivities = $stmt->fetchAll(PDO::FETCH_OBJ);

        // Pass data to the view
        $this->view('dashboard', [
            'totalRequested' => $totalRequested->total_requested ?? 0,
            'totalPending' => $totalPending->total_pending ?? 0,
            'recentActivities' => $recentActivities,
        ]);
    }
    
}
