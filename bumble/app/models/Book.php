<?php

class Book extends Model
{
    public function validate($data)
    {
        $this->errors = [];

        // Validate service availability
        if (!$this->isServiceAvailable($data['book_document'])) {
            $this->errors['availability'] = 'The selected document is not available';
        }

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
}
