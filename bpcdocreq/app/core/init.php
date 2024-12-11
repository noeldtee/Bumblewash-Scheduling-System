<?php

require 'config.php';
require 'functions.php';
require 'Database.php';
require 'Controller.php';
require 'Model.php';
require 'App.php';
require_once __DIR__ . '/../PHPMailer/PHPMailer/src/PHPMailer.php';
require_once __DIR__ . '/../PHPMailer/PHPMailer/src/SMTP.php';
require_once __DIR__ . '/../PHPMailer/PHPMailer/src/Exception.php';

spl_autoload_register(function ($class_name) {

  require 'app/models/' . $class_name . '.php';
});