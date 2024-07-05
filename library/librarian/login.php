<?php
if (isset($_POST['submit'])) {
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Assuming you have a PDO connection established, replace with your own connection details
    $pdo = new PDO('mysql:host=localhost;dbname=your_database', 'username', 'password');

    // Prepare SQL statement with placeholders
    $query = "SELECT * FROM users WHERE username = :username AND password = :password";
    $stmt = $pdo->prepare($query);

    // Bind parameters
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);

    // Execute query
    $stmt->execute();

    // Check if user exists
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['id'] = $row['user_id'];
        header('Location: dashboard.php');
        exit;
    } else {
        echo '<div class="alert alert-danger">Access Denied</div>';
    }
}
?>
