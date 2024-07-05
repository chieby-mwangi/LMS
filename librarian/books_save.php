<?php
include('dbcon.php');

if (isset($_POST['submit'])) {
    // Sanitize and validate input data
    $book_title = mysqli_real_escape_string($conn, $_POST['book_title']);
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $book_copies = mysqli_real_escape_string($conn, $_POST['book_copies']);
    $book_pub = mysqli_real_escape_string($conn, $_POST['book_pub']);
    $publisher_name = mysqli_real_escape_string($conn, $_POST['publisher_name']);
    $isbn = mysqli_real_escape_string($conn, $_POST['isbn']);
    $copyright_year = mysqli_real_escape_string($conn, $_POST['copyright_year']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    // Prepare the SQL statement
    $query = "INSERT INTO book (book_title, category_id, author, book_copies, book_pub, publisher_name, isbn, copyright_year, date_added, status)
              VALUES ('$book_title', '$category_id', '$author', '$book_copies', '$book_pub', '$publisher_name', '$isbn', '$copyright_year', NOW(), '$status')";
    
    // Execute the query
    mysqli_query($conn, $query) or die(mysqli_error($conn));

    // Redirect to a new page after successful insertion
    header('location:books.php');
    exit(); // Ensure no further code execution after redirection
}
?>
