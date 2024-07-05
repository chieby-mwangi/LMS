<?php
// Include dbcon.php which should contain your database connection details
include('dbcon.php');

if (isset($_POST['submit'])) {
    // Sanitize inputs
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $firstname = mysqli_real_escape_string($mysqli, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($mysqli, $_POST['lastname']);
    $gender = mysqli_real_escape_string($mysqli, $_POST['gender']);
    $address = mysqli_real_escape_string($mysqli, $_POST['address']);
    $contact = mysqli_real_escape_string($mysqli, $_POST['contact']);
    $type = mysqli_real_escape_string($mysqli, $_POST['type']);
    $year_level = mysqli_real_escape_string($mysqli, $_POST['year_level']);
    $status = mysqli_real_escape_string($mysqli, $_POST['status']);

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
        // Handle update error
        echo "Error updating record: " . $mysqli->error;
    }
}
?>
