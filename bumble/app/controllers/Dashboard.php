<?php

class Dashboard extends Controller
{
    public function index()
    {
        if (!Auth::logged_in()) {
            redirect('login');
        }

        // Use the connect method directly
        $db = new Database();
        $conn = $db->connect(); // Get the database connection

        // You can now use the connection, for example:
        // $queryResult = $db->query("SELECT * FROM documents");

        $this->view('dashboard');
    }
}
