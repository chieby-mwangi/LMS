<?php
include('dbcon.php'); // Make sure dbcon.php includes your database connection details

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $type = $_POST['type'];
    $year_level = $_POST['year_level'];
    $status = $_POST['status'];

    // Establish database connection using mysqli
    $mysqli = new mysqli("your_host", "your_username", "your_password", "your_database");

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Prepare update statement with prepared statement
    $stmt = $mysqli->prepare("UPDATE member SET firstname=?, lastname=?, gender=?, address=?, contact=?, type=?, year_level=?, status=? WHERE member_id=?");
    $stmt->bind_param("ssssssssi", $firstname, $lastname, $gender, $address, $contact, $type, $year_level, $status, $id);

    // Execute the update statement
    if ($stmt->execute()) {
        // Redirect after successful update
        $stmt->close();
        $mysqli->close();
        header('Location: member.php');
        exit;
    } else {
        echo "Error updating record: " . $mysqli->error;
    }
}
?>
