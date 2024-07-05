<?php
// Include the database connection file
include('dbcon.php');

// Example connection using mysqli
$conn = mysqli_connect("localhost", "username", "password", "database");

// Check if 'id' is set in the GET parameters
if (isset($_GET['id'])) {
    // Sanitize input (if book_id is an integer)
    $id = intval($_GET['id']);

    // Perform the update query using mysqli
    $query = "UPDATE book SET status = 'Archive' WHERE book_id='$id'";
    $result = mysqli_query($conn, $query);

    // Check if query was successful
    if ($result) {
        // Redirect to books.php after the update
        header('Location: books.php');
        exit; // Ensure that no further code execution happens after redirection
    } else {
        // Display error message if update fails
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    // Handle case where 'id' is not set
    echo "No book ID provided.";
}

// Close mysqli connection
mysqli_close($conn);
?>
