<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookstore_db";

$conn = new mysqli ($servername, $username, $password, $dbname);

$conn->set_charset("utf-8");

if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    
}