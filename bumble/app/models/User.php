<?php

class User extends Model
{
    protected $table = 'users';
    public $errors = [];

    public function validate($data)
    {
        $this->errors = [];

        // Validate First Name
        if (empty($data['student_firstname'])) {
            $this->errors['student_firstname'] = 'First name is required.';
        } elseif (!preg_match("/^[a-zA-Z\s]+$/", $data['student_firstname'])) {
            $this->errors['student_firstname'] = 'First name should contain only letters and spaces.';
        }

        // Validate Last Name
        if (empty($data['student_lastname'])) {
            $this->errors['student_lastname'] = 'Last name is required.';
        } elseif (!preg_match("/^[a-zA-Z\s]+$/", $data['student_lastname'])) {
            $this->errors['student_lastname'] = 'Last name should contain only letters and spaces.';
        }

        // Validate Email
        if (empty($data['student_email']) || !filter_var($data['student_email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['student_email'] = 'A valid email is required.';
        }

        // Validate Password
        if (empty($data['student_password']) || strlen($data['student_password']) < 6) {
            $this->errors['student_password'] = 'Password must be at least 6 characters.';
        }

        // Validate Confirm Password
        if (empty($data['student_password_confirm'])) {
            $this->errors['student_password_confirm'] = 'Confirm password is required.';
        } elseif ($data['student_password'] !== $data['student_password_confirm']) {
            $this->errors['student_password_confirm'] = 'Passwords do not match.';
        }

        // Validate Course
        if (empty($data['course'])) {
            $this->errors['course'] = 'Course is required.';
        }

        // Validate Year Level
        if (empty($data['year_level'])) {
            $this->errors['year_level'] = 'Year level is required.';
        } elseif (!in_array($data['year_level'], ['1st Year', '2nd Year', '3rd Year', '4th Year'])) {
            $this->errors['year_level'] = 'Invalid year level selected.';
        }

        // Validate Gender
        if (empty($data['student_gender'])) {
            $this->errors['student_gender'] = 'Gender is required.';
        } elseif (!in_array($data['student_gender'], ['Male', 'Female', 'Prefer not to say'])) {
            $this->errors['student_gender'] = 'Invalid gender selection.';
        }

        // Validate Birthdate
        if (empty($data['student_birthdate'])) {
            $this->errors['student_birthdate'] = 'Birthdate is required.';
        } elseif (!strtotime($data['student_birthdate'])) {
            $this->errors['student_birthdate'] = 'Invalid birthdate.';
        }

        // Validate Phone Number (Philippines format)
        if (empty($data['student_number'])) {
            $this->errors['student_number'] = 'Phone number is required.';
        } elseif (!preg_match("/^(09|\+639)\d{9}$/", $data['student_number'])) {
            $this->errors['student_number'] = 'Enter a valid Philippine phone number (e.g., 09123456789 or +639123456789).';
        }

        // Validate Terms Agreement (optional if necessary)
        if (empty($data['terms'])) {
            $this->errors['terms'] = 'You must agree to the terms and conditions.';
        }

        // Return validation status
        return empty($this->errors);
    }

    public function findByStudentId($studentId)
    {
        return $this->first(['student_id' => $studentId]);
    }

    public function findByEmail($email)
    {
        return $this->first(['student_email' => $email]);
    }

    public function findByStudentNumber($studentNumber)
    {
        return $this->first(['student_number' => $studentNumber]);
    }
}