<?php

class Admin extends Model
{
  public function validate($data)
  {
    $this->errors = [];

    if (empty($data['admin_name'])) {

      $this->errors['admin_name'] = 'Username is required';
    }

    if (empty($data['admin_fn'])) {

      $this->errors['admin_fn'] = 'First name is required';
    }

    if (empty($data['admin_ln'])) {

      $this->errors['admin_ln'] = 'Last name is required';
    }

    if (empty($data['admin_email'])) {

      $this->errors['admin_email'] = 'Email is required';
    } else if (!filter_var($data['admin_email'], FILTER_VALIDATE_EMAIL)) {

      $this->errors['admin_email'] = 'Email is not valid';
    }

    if (empty($data['admin_password'])) {

      $this->errors['admin_password'] = 'Password is required';
    } else if (strlen($data['admin_email']) < 6) {

      $this->errors['admin_password'] = 'Password must be atleast 6 characters long';
    }

    if (empty($data['admin_number'])) {
      $this->errors['admin_number'] = 'Mobile number is required';
    } else {
        // Validate Philippine phone number format
        $phonePattern = '/^(09|\+639)([0-9]{2}-?)[0-9]{3}-?[0-9]{4}$/'; // Pattern for Philippine mobile numbers
        if (!preg_match($phonePattern, $data['admin_number'])) {
          $this->errors['admin_number'] = 'Invalid mobile number format (e.g., 09123456789 or +639123456789)';
        }
    }

    if (count($this->errors) == 0) {
      return true;
    }
    return false;
  }
  
}