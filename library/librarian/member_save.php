<?php
// Include database connection file
include('dbcon.php');

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $type = $_POST['type'];
    $year_level = $_POST['year_level'];

    // Prepare SQL query using MySQLi prepared statements
    $stmt = $mysqli->prepare("INSERT INTO member (firstname, lastname, gender, address, contact, type, year_level) VALUES (?, ?, ?, ?, ?, ?, ?)");
    
    // Bind parameters
    $stmt->bind_param("sssssss", $firstname, $lastname, $gender, $address, $contact, $type, $year_level);
    
    // Execute statement
    if ($stmt->execute()) {
        // Redirect to member.php on successful insertion
        header('Location: member.php');
        exit;
    } else {
        // Handle error
        die('Error : ('. $mysqli->errno .') '. $mysqli->error);
    }

    // Close statement
    $stmt->close();
}

// Close connection
$mysqli->close();
?>
