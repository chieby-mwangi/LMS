<?php
$host = 'localhost';
$username = 'root';
$password = '49324932';
$database = 'myo lms db';

// Create connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
