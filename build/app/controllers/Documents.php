<?php

class Documents extends Controller
{
    public function index()
    {
        $errors = [];
        $document = new Document(); // Assuming you have a `Document` model
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate form inputs
            $status = isset($_POST['status']) ? trim($_POST['status']) : '';
            $data = [
                'document_type' => trim($_POST['document_type'] ?? ''),
                'price' => trim($_POST['price'] ?? ''),
                'status' => $status,
            ];
    
            // Basic validation
            if (empty($data['document_type'])) {
                $errors['document_type'] = "Document type is required.";
            }
            if (empty($data['price']) || !is_numeric($data['price']) || $data['price'] <= 0) {
                $errors['price'] = "Valid price is required.";
            }
            if (empty($data['status']) || !in_array($data['status'], ['Available', 'Not Available'])) {
                $errors['status'] = "Invalid status.";
            }
    
            // If no errors, insert into the database
            if (empty($errors)) {
                if ($document->insert($data)) {
                    // Redirect to the dashboard
                    redirect('Dashboard');// Update `/dashboard` with your actual dashboard route
                    exit; // Stop further script execution
                } else {
                    $errors['database'] = "Failed to insert document. Please try again.";
                }
            }
        }
    
        // Load the view with data
        $this->view('documents/document', [
            'errors' => $errors,
        ]);
    }

    public function doc()
    { 
      $this->view('documents/doc');
    }
}
