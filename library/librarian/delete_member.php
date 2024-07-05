<?php
include('dbcon.php'); // Include your database connection script

// Check if the 'id' parameter is set and numeric
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $id = mysqli_real_escape_string($connection, $_GET['id']);
    
    // Construct the query using prepared statement
    $query = "DELETE FROM member WHERE member_id = ?";
    $stmt = mysqli_prepare($connection, $query);
    
    // Bind the parameter and execute the statement
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    
    // Check if the deletion was successful
    if(mysqli_stmt_affected_rows($stmt) > 0) {
        // Redirect to member.php after successful deletion
        header('location: member.php');
        exit();
    } else {
        // Handle case where no rows were affected (member not found)
        echo "No member found with ID: $id";
    }
    
    // Close statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
} else {
    // Handle case where 'id' parameter is missing or not numeric
    echo "Invalid member ID";
}
?>
