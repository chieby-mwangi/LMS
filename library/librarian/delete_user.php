<?php
include('dbcon.php'); // Include your database connection script

// Check if 'id' parameter is set and numeric
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $id = mysqli_real_escape_string($connection, $_GET['id']);
    
    // Prepare the delete statement
    $query = "DELETE FROM users WHERE user_id = ?";
    $stmt = mysqli_prepare($connection, $query);
    
    // Bind the parameter and execute the statement
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    
    // Check if any rows were affected
    $rows_affected = mysqli_stmt_affected_rows($stmt);
    
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Check if deletion was successful and redirect
    if($rows_affected > 0) {
        header('Location: users.php');
        exit;
    } else {
        echo "Failed to delete user with ID: $id";
    }
} else {
    // Handle case where 'id' parameter is missing or not numeric
    echo "Invalid user ID";
}

// Close database connection
mysqli_close($connection);
?>
