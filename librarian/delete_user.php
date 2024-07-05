<?php
include('dbcon.php');

$id = mysqli_real_escape_string($conn, $_GET['id']); // Sanitize input to prevent SQL injection

$query = "DELETE FROM users WHERE user_id='$id'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error: " . mysqli_error($conn)); // Handle error gracefully
}

mysqli_close($conn); // Close the MySQL connection

header('location: users.php');
exit(); // Ensure no further code execution after redirection
?>
