<?php

class Dashboard extends Controller
{
    public function index()
    {
        if (!Auth::logged_in()) {
            redirect('login');
        }

        $user_id = $_SESSION['USER']->student_id; // Assuming the user's ID is stored in the session
        $db = new Database();
        $conn = $db->connect();

        // Fetch total documents requested by the student
        $totalRequestedQuery = "SELECT COUNT(*) AS total_requested FROM books WHERE student_id = :student_id";
        $stmt = $conn->prepare($totalRequestedQuery);
        $stmt->execute(['student_id' => $user_id]);
        $totalRequested = $stmt->fetch(PDO::FETCH_OBJ);

        // Fetch total pending documents
        $pendingQuery = "SELECT COUNT(*) AS total_pending FROM books WHERE student_id = :student_id AND book_status = 'pending'";
        $stmt = $conn->prepare($pendingQuery);
        $stmt->execute(['student_id' => $user_id]);
        $totalPending = $stmt->fetch(PDO::FETCH_OBJ);

        // Fetch recent activities (last 5 requests)
        $recentActivityQuery = "SELECT * FROM books WHERE student_id = :student_id ORDER BY created_at DESC LIMIT 5";
        $stmt = $conn->prepare($recentActivityQuery);
        $stmt->execute(['student_id' => $user_id]);
        $recentActivities = $stmt->fetchAll(PDO::FETCH_OBJ);

        // Pass data to the view
        $this->view('dashboard', [
            'totalRequested' => $totalRequested->total_requested,
            'totalPending' => $totalPending->total_pending,
            'recentActivities' => $recentActivities,
        ]);
    }
}
