<?php

class Book extends Model
{
    public function validate($data)
    {
        $this->errors = [];

        // Debugging: Log the input data
        error_log("Validating data: " . print_r($data, true));

        // Check if `book_document` is an array
        if (isset($data['book_document']) && is_array($data['book_document'])) {
            foreach ($data['book_document'] as $index => $document) {
                if (!$this->isServiceAvailable($document)) {
                    $this->errors['availability'][$index] = "The document '$document' is not available";
                }
            }
        } else {
            $this->errors['book_document'] = 'No documents selected or invalid format';
        }

        // Debugging: Log the errors
        error_log("Validation errors: " . print_r($this->errors, true));

        // Return validation result
        return count($this->errors) === 0;
    }

    private function isServiceAvailable($document)
    {
        $db = new Database();
        $connection = $db->connect();

        // Check availability of the document
        $query = "SELECT COUNT(*) AS count FROM services WHERE document = :document AND status = 'Available'";
        $stmt = $connection->prepare($query);
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
    }

    public function findWhere($whereClause, $params = [])
    {
        $db = new Database(); // Create a new instance of the Database class
        $connection = $db->connect(); // Get the database connection
    
        $query = "SELECT * FROM books WHERE $whereClause ORDER BY created_at DESC";
        $stmt = $connection->prepare($query); // Use the connection to prepare the query
        $stmt->execute($params);
    
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function updateStatus($id, $newStatus)
    {
        $query = "UPDATE books SET book_status = :status WHERE id = :id";
        $db = new Database();
        $db->query($query, ['status' => $newStatus, 'id' => $id]);
    }

public function find($id)
{
    $query = "SELECT * FROM books WHERE id = :id LIMIT 1";
    $db = new Database();
    $result = $db->query($query, ['id' => $id]);
    return $result ? $result[0] : null; // Return the first result or null if none
}
}

