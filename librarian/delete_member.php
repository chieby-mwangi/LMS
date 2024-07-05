<?php
include('dbcon.php');

$id = mysqli_real_escape_string($conn, $_GET['id']); // Sanitize input to prevent SQL injection

mysqli_query($conn, "DELETE FROM member WHERE member_id='$id'") or die(mysqli_error($conn));

mysqli_close($conn); // Close the MySQL connection

header('location: member.php');
exit(); // Ensure no further code execution after redirection
?>
