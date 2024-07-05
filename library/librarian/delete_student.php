<?php
include('dbcon.php');

// Check if 'id' parameter is set and numeric
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $id = mysqli_real_escape_string($connection, $_GET['id']);
    
    // Perform the delete operation
    $query = "DELETE FROM member WHERE member_id='$id'";
    $result = mysqli_query($connection, $query);
    
    if($result) {
        // Successful deletion, redirect to member.php
        header('Location: member.php');
        exit;
    } else {
        // Error handling
        die('Error deleting member: ' . mysqli_error($connection));
    }
} else {
    // Handle case where 'id' parameter is missing or not numeric
    die('Invalid member ID');
}

// Close database connection
mysqli_close($connection);
?>
