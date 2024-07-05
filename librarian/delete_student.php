<?php
include('dbcon.php');

// Sanitize input to prevent SQL injection
$id = mysqli_real_escape_string($conn, $_GET['id']);

// Perform delete query
$query = "DELETE FROM member WHERE member_id='$id'";
$result = mysqli_query($conn, $query);

// Check if query was successful
if (!$result) {
    die("Error: " . mysqli_error($conn)); // Handle error gracefully
}

mysqli_close($conn); // Close the MySQL connection

// Redirect to member.php after deletion
header('location: member.php');
exit(); // Ensure no further code execution after redirection
?>
