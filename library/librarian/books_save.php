<?php
include('dbcon.php'); // Assuming this file contains your database connection details

if (isset($_POST['submit'])) {
    // Sanitize inputs (you can improve this based on your validation needs)
    $book_title = mysqli_real_escape_string($conn, $_POST['book_title']);
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $book_copies = mysqli_real_escape_string($conn, $_POST['book_copies']);
    $book_pub = mysqli_real_escape_string($conn, $_POST['book_pub']);
    $publisher_name = mysqli_real_escape_string($conn, $_POST['publisher_name']);
    $isbn = mysqli_real_escape_string($conn, $_POST['isbn']);
    $copyright_year = mysqli_real_escape_string($conn, $_POST['copyright_year']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    
    // Query to insert data into 'book' table
    $query = "INSERT INTO book (book_title, category_id, author, book_copies, book_pub, publisher_name, isbn, copyright_year, date_added, status) 
              VALUES ('$book_title', '$category_id', '$author', '$book_copies', '$book_pub', '$publisher_name', '$isbn', '$copyright_year', 
                      NOW(), '$status')";
    
    if (mysqli_query($conn, $query)) {
        // Redirect to books.php after successful insertion
        header('Location: books.php');
        exit();
    } else {
        // Handle errors
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn); // Close the database connection
}
?>
