<?php 
include('dbcon.php');

// Get and sanitize the input parameters
$id = $_GET['id'];
$book_id = $_GET['book_id'];

// Establish a connection to the database using mysqli
$connection = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Prepare the SQL statement with placeholders
$stmt = $connection->prepare("UPDATE borrow 
    LEFT JOIN borrowdetails ON borrow.borrow_id = borrowdetails.borrow_id 
    SET borrow_status = 'returned', date_return = NOW() 
    WHERE borrow.borrow_id = ? AND borrowdetails.book_id = ?");

// Bind the parameters
$stmt->bind_param("ii", $id, $book_id);

// Execute the query
if ($stmt->execute()) {
    // Redirect on success
    header('Location: view_borrow.php');
} else {
    // Display an error message on failure
    die("Error updating record: " . $stmt->error);
}

// Close the statement and connection
$stmt->close();
$connection->close();
?>
