<?php

class Service extends Model
{
  public function validate($data)
  {
    $this->errors = [];

    if (empty($data['document'])) {
      $this->errors['document'] = 'Document is required';
    }
    if (count($this->errors) == 0) {
      return true;
    }
    return false;
  }
}