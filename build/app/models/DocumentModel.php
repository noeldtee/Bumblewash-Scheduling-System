<?php

class DocumentModel extends Model
{
    protected $table = 'documents';

    public function getAvailableDocuments()
    {
        $db = new Database();
        $connection = $db->connect();

        $query = "SELECT document_type FROM documents WHERE status = 'Available'";
        $stmt = $connection->query($query);

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Return an array of document types
    }

    public function getPriceByType($document_type)
    {
        $db = new Database();
        $connection = $db->connect();

        $query = "SELECT price FROM documents WHERE document_type = :document_type LIMIT 1";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':document_type', $document_type, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['price'] ?? null; // Return price if found, or null
        }

        return null; // Return null if query fails
    }
}