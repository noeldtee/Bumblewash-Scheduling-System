<?php

class Service extends Model
{
  public function validate($data)
  {
    $this->errors = [];

    if (empty($data['service'])) {
      $this->errors['service'] = 'Service is required';
    }
    if (empty($data['vehicle'])) {
        $this->errors['vehicle'] = 'Vehicle Type is required';
      }
      if (empty($data['price'])) {
        $this->errors['price'] = 'Price is required';
      }

    if (count($this->errors) == 0) {
      return true;
    }
    return false;
  }
}