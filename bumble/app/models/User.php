<?php

class User extends Model
{
  public function validate($data)
  {
    $this->errors = [];

    if (empty($data['username'])) {

      $this->errors['username'] = 'Username is required';
    }
    if (empty($data['firstname'])) {

      $this->errors['firstname'] = 'First name is required';
    }

    if (empty($data['lastname'])) {

      $this->errors['lastname'] = 'Last name is required';
    }

    if (empty($data['email'])) {

      $this->errors['email'] = 'Email is required';
    } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {

      $this->errors['email'] = 'Email is not valid';
    }

    if (empty($data['password'])) {

      $this->errors['password'] = 'Password is required';
    } else if (strlen($data['password']) < 6) {

      $this->errors['password'] = 'Password must be atleast 6 characters long';
    }
    if (empty($data['number'])) {
      $this->errors['number'] = 'Mobile number is required';
    } else {
        $phonePattern = '/^(09|\+639)([0-9]{2}-?)[0-9]{3}-?[0-9]{4}$/';
        if (!preg_match($phonePattern, $data['number'])) {
          $this->errors['number'] = 'Invalid mobile number format (e.g., 09123456789 or +639123456789)';
        }
    }

    if (count($this->errors) == 0) {
      return true;
    }
    return false;
  }
  
}