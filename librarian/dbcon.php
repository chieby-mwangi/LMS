<?php
// Create connection
$connection = mysqli_connect('localhost', 'root', '49324932', 'myo_lms_db');

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select database (optional, since it's already selected in the connection)
mysqli_select_db($connection, 'myo_lms_db') or die(mysqli_error($connection));

// Your code here...

// Close the connection when done
mysqli_close($connection);
?>
