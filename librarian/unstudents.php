<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_dasboard.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">	
                            <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
                                <div class="alert alert-info">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Unconfirmed Students Table</strong>
                                </div>
						
                                <thead>
                                    <tr>
                                        <th>Student_No</th>
                                        <th>Password</th>                                 
                                        <th>Name</th>                                 
                                        <th>Course</th>                                 
                                        <th>Gender</th>                                 
                                        <th>Address</th>                                 
                                        <th>Contact No</th>                                 
                                        <th>Photo</th>                                 
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								 
                                <?php
// Database connection
try {
    $pdo = new PDO('mysql:host=your_host;dbname=your_db', 'your_user', 'your_password');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}

// Query to select unactive students
try {
    $stmt = $pdo->prepare("SELECT * FROM students WHERE status = :status");
    $stmt->execute(['status' => 'unactive']);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id = htmlspecialchars($row['student_id']);
        $student_no = htmlspecialchars($row['student_no']);
        $password = htmlspecialchars($row['password']);
        $name = htmlspecialchars($row['firstname']) . " " . htmlspecialchars($row['lastname']);
        $course = htmlspecialchars($row['course']);
        $gender = htmlspecialchars($row['gender']);
        $address = htmlspecialchars($row['address']);
        $contact = htmlspecialchars($row['contact']);
        $photo = htmlspecialchars($row['photo']);
        ?>
        <tr class="del<?php echo $id ?>">
            <td><?php echo $student_no; ?></td>
            <td><?php echo $password; ?></td>
            <td><?php echo $name; ?></td>
            <td><?php echo $course; ?></td>
            <td><?php echo $gender; ?></td>
            <td><?php echo $address; ?></td>
            <td><?php echo $contact; ?></td>
            <td width="60"><img src="<?php echo $photo; ?>" width="60" height="60"></td>
            <?php include('toolttip_edit_delete.php'); ?>
            <td width="150">
                <a href="#confirm<?php echo $id; ?>" data-toggle="modal" class="btn btn-success"><i class="icon-check"></i>&nbsp;Confirm Request</a>
                <?php include('confirm_request.php'); ?>
            </td>
        </tr>
        <?php
    }
} catch (PDOException $e) {
    die("Error querying the database: " . $e->getMessage());
}
?>

                           
                                </tbody>
                            </table>
							
			
			</div>		
			</div>
		</div>
    </div>
<?php include('footer.php') ?>