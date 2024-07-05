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
    
    // Bind parameters
    $stmt->bind_param("sssssss", $firstname, $lastname, $gender, $address, $contact, $type, $year_level);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to member.php if insertion is successful
        header('Location: member.php');
    } else {
        // Display an error message if insertion fails
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
