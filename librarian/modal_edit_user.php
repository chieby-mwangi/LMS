	<div id="edit<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<div class="alert alert-info"><strong>Edit User</strong></div>
	<form class="form-horizontal" method="post">
			<div class="control-group">
				<label class="control-label" for="inputEmail">Username</label>
				<div class="controls">
				<input type="hidden" id="inputEmail" name="id" value="<?php echo $row['user_id']; ?>" required>
				<input type="text" id="inputEmail" name="username" value="<?php echo $row['username']; ?>" required>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPassword">Password</label>
				<div class="controls">
				<input type="text" name="password" id="inputPassword" value="<?php echo $row['password']; ?>" required>
				</div>
			</div>
				<div class="control-group">
				<label class="control-label" for="inputEmail">Firstname</label>
				<div class="controls">
	
				<input type="text" id="inputEmail" name="firstname" value="<?php echo $row['firstname']; ?>" required>
				</div>
			</div>
				<div class="control-group">
				<label class="control-label" for="inputEmail">Lastname</label>
				<div class="controls">

				<input type="text" id="inputEmail" name="lastname" value="<?php echo $row['lastname']; ?>" required>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
				<button name="edit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Update</button>
				</div>
			</div>
    </form>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
		</div>
    </div>
	
	<?php
if (isset($_POST['edit'])) {
    $user_id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    // Create connection
    $connection = mysqli_connect('localhost', 'root', '', 'myo_lms_db');

    // Check connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare and bind
    $stmt = $connection->prepare("UPDATE users SET username = ?, password = ?, firstname = ?, lastname = ? WHERE user_id = ?");
    $stmt->bind_param("ssssi", $username, $password, $firstname, $lastname, $user_id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        die("Error: " . $stmt->error);
    }

    // Close the statement and connection
    $stmt->close();
    mysqli_close($connection);
    ?>
    <script>
        window.location = "users.php";
    </script>
    <?php
}
?>
