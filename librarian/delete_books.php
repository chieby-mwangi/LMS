<?php
include('dbcon.php');

$id = mysqli_real_escape_string($conn, $_GET['id']); // Sanitize input to prevent SQL injection

mysqli_query($conn, "UPDATE book SET status = 'Archive' WHERE book_id='$id'") or die(mysqli_error($conn));

mysqli_close($conn); // Close the MySQL connection

header('location: books.php');
exit(); // Ensure no further code execution after redirection
?>
