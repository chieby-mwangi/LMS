<?php
if (isset($_POST['submit'])) {
    session_start();
    include('dbcon.php'); // Assuming dbcon.php contains mysqli connection setup

    $username = mysqli_real_escape_string($conn, $_POST['username']); // Sanitize input
    $password = mysqli_real_escape_string($conn, $_POST['password']); // Sanitize input

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die('Query failed: ' . mysqli_error($conn));
    }

    $num_row = mysqli_num_rows($result);

    if ($num_row > 0) {
        $row = mysqli_fetch_array($result);
        $_SESSION['id'] = $row['user_id'];
        mysqli_close($conn); // Close the MySQL connection
        header('location:dashboard.php');
        exit();
    } else { ?>
        <div class="alert alert-danger">Access Denied</div>
    <?php }

    mysqli_close($conn); // Close the MySQL connection
}
?>
