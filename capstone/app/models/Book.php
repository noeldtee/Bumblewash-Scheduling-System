<?php

class Book extends Model
{
    public function validate($data)
    {
        $this->errors = [];

        // Check if the document has already been requested by this student with a pending request
        if (isset($data['book_document']) && is_array($data['book_document'])) {
            foreach ($data['book_document'] as $index => $document) {
                if ($this->isDocumentRequested($data['student_id'], $document)) {
                    $this->errors['availability'][$index] = "You have already requested this document and it is pending completion.";
                }
            }
        } else {
            $this->errors['book_document'] = 'No documents selected or invalid format';
        }

        return count($this->errors) === 0;
    }

    private function isDocumentRequested($studentId, $document)
    {
        $db = new Database();
        $connection = $db->connect();

        // Check if a record exists for this student with the document and status not completed
        $query = "SELECT COUNT(*) AS count FROM books WHERE student_id = :student_id AND book_document = :document AND book_status != 'completed'";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':student_id', $studentId);
        $stmt->bindParam(':document', $document);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['count'] > 0;
    }

    public function insert($data)
    {
        $keys = array_keys($data);
        $query = "INSERT INTO books (" . implode(',', $keys) . ") VALUES (:" . implode(',:', $keys) . ")";
        $db = new Database();
        $db->query($query, $data);

        // Send notification to admin
        $this->sendAdminNotification($data['student_id']);
    }

    private function sendAdminNotification($student_id)
    {
        $adminEmail = "admin@example.com";
        $subject = "New Document Request";
        $message = "A new document request has been made by student ID: $student_id.";
        mail($adminEmail, $subject, $message);
    }

    public function findWhere($whereClause, $params = [])
    {
        $db = new Database();
        $connection = $db->connect();

        $query = "SELECT * FROM books WHERE $whereClause ORDER BY created_at DESC";
        $stmt = $connection->prepare($query);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function updateStatus($id, $newStatus)
    {
        $query = "UPDATE books SET book_status = :status WHERE id = :id";
        $db = new Database();
        $db->query($query, ['status' => $newStatus, 'id' => $id]);
    }

    public function updateStatusWithPickupDate($id, $newStatus, $pickupDate)
{
    $query = "UPDATE books SET book_status = :status, pickup_date = :pickup_date WHERE id = :id";
    $db = new Database();
    $db->query($query, [
        'status' => $newStatus,
        'pickup_date' => $pickupDate,
        'id' => $id
    ]);
}

    public function find($id)
    {
        $query = "SELECT * FROM books WHERE id = :id LIMIT 1";
        $db = new Database();
        $result = $db->query($query, ['id' => $id]);
        return $result ? $result[0] : null;
    }
    
}