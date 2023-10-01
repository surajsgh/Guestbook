<?php 
  // CONSTANTS
  define('DB_HOST', 'localhost');
  define('DB_USERNAME', 'user');
  define('DB_PASSWORD', '123456');
  define('DB_NAME', 'php_dev');

  // CREATE CONNECTION
  $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

  // CHECK CONNECTION
  if($conn->connect_error) {
    die("Error occurred while connecting to the database $conn->connect_error");
  }
  
  // echo "Connected successfully....";
?>