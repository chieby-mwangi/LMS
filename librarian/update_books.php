<?php
// Ensure dbcon.php includes a PDO connection named $pdo

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $book_title = $_POST['book_title'];
    $category_id = $_POST['category_id'];
    $author = $_POST['author'];
    $book_copies = $_POST['book_copies'];
    $book_pub = $_POST['book_pub'];
    $publisher_name = $_POST['publisher_name'];
    $isbn = $_POST['isbn'];
    $copyright_year = $_POST['copyright_year'];
    $status = $_POST['status'];

    try {
        $stmt = $pdo->prepare("UPDATE book SET 
            book_title = :book_title,
            category_id = :category_id,
            author = :author,
            book_copies = :book_copies,
            book_pub = :book_pub,
            publisher_name = :publisher_name,
            isbn = :isbn,
            copyright_year = :copyright_year,
            status = :status
            WHERE book_id = :id");

        $stmt->execute([
            'book_title' => $book_title,
            'category_id' => $category_id,
            'author' => $author,
            'book_copies' => $book_copies,
            'book_pub' => $book_pub,
            'publisher_name' => $publisher_name,
            'isbn' => $isbn,
            'copyright_year' => $copyright_year,
            'status' => $status,
            'id' => $id
        ]);

        header('location: books.php');
        exit();
    } catch (PDOException $e) {
        die("Error updating record: " . $e->getMessage());
    }
}
?>
