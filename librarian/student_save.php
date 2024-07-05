<?php 
include('dbcon.php');

if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $type = $_POST['type'];
    $year_level = $_POST['year_level'];

    // Create a prepared statement
    $stmt = $conn->prepare("INSERT INTO member (firstname, lastname, gender, address, contact, type, year_level) VALUES (?, ?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die('prepare() failed: ' . htmlspecialchars($conn->error));
    }

    // Bind the parameters
    $bind = $stmt->bind_param('sssssss', $firstname, $lastname, $gender, $address, $contact, $type, $year_level);
    if ($bind === false) {
        die('bind_param() failed: ' . htmlspecialchars($stmt->error));
    }

    // Execute the statement
    $exec = $stmt->execute();
    if ($exec === false) {
        die('execute() failed: ' . htmlspecialchars($stmt->error));
    }

    // Close the statement
    $stmt->close();

    // Redirect to member.php
    header('Location: member.php');
    exit;
}
?>
