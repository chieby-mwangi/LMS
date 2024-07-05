<?php
include('dbcon.php');

$id = $_POST['selector'];
$member_id = mysqli_real_escape_string($conn, $_POST['member_id']);
$due_date = mysqli_real_escape_string($conn, $_POST['due_date']);

if (empty($id)) { 
    header("location: borrow.php");
    exit(); // Add exit after header redirect
} else {
    // Insert into borrow table
    $insert_borrow_query = "INSERT INTO borrow (member_id, date_borrow, due_date) VALUES ('$member_id', NOW(), '$due_date')";
    mysqli_query($conn, $insert_borrow_query) or die(mysqli_error($conn));

    // Get the last inserted borrow_id
    $last_borrow_id = mysqli_insert_id($conn);

    // Insert into borrowdetails table for each selected book
    $N = count($id);
    for ($i = 0; $i < $N; $i++) {
        $book_id = mysqli_real_escape_string($conn, $id[$i]);
        $insert_details_query = "INSERT INTO borrowdetails (book_id, borrow_id, borrow_status) VALUES ('$book_id', '$last_borrow_id', 'pending')";
        mysqli_query($conn, $insert_details_query) or die(mysqli_error($conn));
    }

    // Redirect back to borrow.php after successful insertion
    header("location: borrow.php");
    exit(); // Ensure no further code execution after redirection
}
?>
