<?php

class Message extends Model
{
  public function validate($data)
  {
    $this->errors = [];

    if (empty($data['message'])) {
      $this->errors['message'] = 'Message is required';
    }

    if (count($this->errors) == 0) {
      return true;
    }
    return false;
  }
}