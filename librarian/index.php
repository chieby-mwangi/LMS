<?php include('header.php'); ?>
<?php include('navbar.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">
					<div class="sti">
						<img src="../LMS/vit.png" class="img-rounded">
					</div>
				<div class="login">
				<div class="log_txt">
				<p><strong>Please Enter the Details Below..</strong></p>
				</div>
						<form class="form-horizontal" method="POST">
								<div class="control-group">
									<label class="control-label" for="inputEmail">Username</label>
									<div class="controls">
									<input type="text" name="username" id="username" placeholder="Username" required>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="inputPassword">Password</label>
									<div class="controls">
									<input type="password" name="password" id="password" placeholder="Password" required>
								</div>
								</div>
								<div class="control-group">
									<div class="controls">
									<button id="login" name="submit" type="submit" class="btn"><i class="icon-signin icon-large"></i>&nbsp;Submit</button>
								</div>
								</div>
								
								<?php
if (isset($_POST['submit'])) {
    session_start();
    include('dbcon.php'); // Assuming dbcon.php contains mysqli connection setup

    $username = mysqli_real_escape_string($conn, $_POST['username']); // Sanitize input
    $password = mysqli_real_escape_string($conn, $_POST['password']); // Sanitize input

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
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

						</form>
				
				</div>
			</div>		
			</div>
		</div>
    </div>
<?php include('footer.php') ?>