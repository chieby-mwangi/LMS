<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_dashboard.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">	
			<?php
// Assuming $get_id is already defined or retrieved from somewhere else securely

// Establish a database connection (replace with your actual database credentials)
$connection = mysqli_connect("localhost", "username", "password", "database_name");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Escape $get_id to prevent SQL injection
$get_id = mysqli_real_escape_string($connection, $get_id);

// Query to fetch data
$query = mysqli_query($connection, "SELECT * FROM member WHERE member_id='$get_id'") or die(mysqli_error($connection));

// Fetch the row as an associative array
if ($row = mysqli_fetch_array($query)) {
    // Process the retrieved data
    // Example usage:
    echo "Member ID: " . $row['member_id'] . "<br>";
    echo "Name: " . $row['name'] . "<br>";
    echo "Email: " . $row['email'] . "<br>";
    // Add more fields as needed
} else {
    echo "No member found with ID: " . $get_id;
}

// Close the database connection
mysqli_close($connection);
?>

             <div class="alert alert-info"><i class="icon-pencil"></i>&nbsp;Edit Member</div>
			<p><a class="btn btn-info" href="member.php"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a></p>
	<div class="addstudent">
	<div class="details">Please Enter Details Below</div>	
	<form class="form-horizontal" method="POST" action="update_students.php" enctype="multipart/form-data">
			
		<div class="control-group">
			<label class="control-label" for="inputEmail">Firstname:</label>
			<div class="controls">
			<input type="text" id="inputEmail" name="firstname" value="<?php echo $row['firstname']; ?>" placeholder="Firstname" required>
			<input type="hidden" id="inputEmail" name="id" value="<?php echo $get_id;  ?>" placeholder="Firstname" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Lastname:</label>
			<div class="controls">
			<input type="text" id="inputPassword" name="lastname" value="<?php echo $row['lastname']; ?>" placeholder="Lastname" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Gender:</label>
			<div class="controls">
			<input type="text" id="inputPassword" name="gender" value="<?php echo $row['gender']; ?>" placeholder="Gender" required>
			</div>
		</div>	
		<div class="control-group">
			<label class="control-label" for="inputPassword">Adddress:</label>
			<div class="controls">
			<input type="text" id="inputPassword" name="address" value="<?php echo $row['address']; ?>" placeholder="Address" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Contact:</label>
			<div class="controls">
			<input type='tel' pattern="[0-9]{11,11}" class="search" name="contact"  placeholder="Phone Number"  autocomplete="off"  maxlength="11" >
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Type:</label>
			<div class="controls">
			<select name="type" required>
			
			
<<?php
// Assuming $get_id is already defined or retrieved from somewhere else securely

// Establish a database connection (replace with your actual database credentials)
$connection = mysqli_connect("localhost", "username", "password", "database_name");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Escape $get_id to prevent SQL injection
$get_id = mysqli_real_escape_string($connection, $get_id);

// Query to fetch data
$query = mysqli_query($connection, "SELECT * FROM member WHERE member_id='$get_id'") or die(mysqli_error($connection));

// Fetch the row as an associative array
if ($row1 = mysqli_fetch_array($query)) {
    // Process the retrieved data
    // Example usage:
    echo "Member ID: " . $row1['member_id'] . "<br>";
    echo "Name: " . $row1['name'] . "<br>";
    echo "Email: " . $row1['email'] . "<br>";
    // Add more fields as needed
} else {
    echo "No member found with ID: " . $get_id;
}

// Close the database connection
mysqli_close($connection);
?>
		
									
									<option> </option>
									<option>Student</option>
									<option>Teacher</option>
									
				</select>
			</div>
		</div>
			
		<div class="control-group">
			<label class="control-label" for="inputPassword">Year Level:</label>
			<div class="controls">
				<select name="year_level" required>
					
				<?php
// Assuming $get_id is already defined or retrieved from somewhere else securely

// Establish a database connection (replace with your actual database credentials)
$connection = mysqli_connect("localhost", "username", "password", "database_name");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Escape $get_id to prevent SQL injection
$get_id = mysqli_real_escape_string($connection, $get_id);

// Query to fetch data
$query = mysqli_query($connection, "SELECT * FROM member WHERE member_id='$get_id'") or die(mysqli_error($connection));

// Fetch the row as an associative array
if ($row1 = mysqli_fetch_array($query)) {
    // Process the retrieved data
    // Example usage:
    echo "Member ID: " . $row1['member_id'] . "<br>";
    echo "Name: " . $row1['name'] . "<br>";
    echo "Email: " . $row1['email'] . "<br>";
    // Add more fields as needed
} else {
    echo "No member found with ID: " . $get_id;
}

// Close the database connection
mysqli_close($connection);
?>
			
								
									<option> </option>
									<option>First Year</option>
									<option>Second Year</option>
									<option>Third Year</option>
									<option>Fourth Year</option>
				</select>
			</div>
		</div>
		
		
				
		
		
		
		<div class="control-group">
			<div class="controls">
			<button name="submit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Update</button>
			</div>
		</div>
    </form>				
			</div>		
			</div>		
			</div>
		</div>
    </div>
<?php include('footer.php') ?>