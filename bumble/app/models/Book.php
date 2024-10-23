<?php

class Book extends Model
{
    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['book_name'])) {
            $this->errors['book_name'] = 'Book name is required';
        }

        if (empty($data['book_date'])) {
            $this->errors['book_date'] = 'Date is required';
        } else {
            $today = date('Y-m-d');
            if ($data['book_date'] < $today) {
                $this->errors['book_date'] = 'The selected date is in the past';
            } else {
                $db = new Database();
                $connection = $db->connect();
                $query = "SELECT * FROM books WHERE book_date = :book_date AND book_time = :book_time";
                
                $stmt = $connection->prepare($query);
                $stmt->bindParam(':book_date', $data['book_date']);
                $stmt->bindParam(':book_time', $data['book_time']);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $this->errors['book_time'] = 'The selected time slot is already booked';
                }
            }
        }
        if (!$this->isServiceAndVehicleAvailable($data['book_services'], $data['book_vehicle'])) {
            $this->errors['availability'] = 'The selected service and vehicle are not available';
        }
        
        if (count($this->errors) == 0) {
            return true;
        }
        return false;
    }

    private function isServiceAndVehicleAvailable($service, $vehicle)
    {
        $db = new Database();
        $connection = $db->connect();

        $query = "SELECT COUNT(*) AS count FROM services WHERE service = :service AND vehicle = :vehicle AND status = 'Available'";
        $stmt = $connection->prepare($query);
        $stmt->bindParam(':service', $service);
        $stmt->bindParam(':vehicle', $vehicle);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['count'] > 0;
    }
}