<?php

class Request extends Model
{
    protected $table = 'requests'; // Use the updated table name
    public $errors = [];

    public function validate($data)
    {
        $this->errors = [];
    }
}