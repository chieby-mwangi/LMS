	<?php
 	include('dbcon.php');
	
		$id=$_POST['selector'];
 	$member_id  = $_POST['member_id'];
	$due_date  = $_POST['due_date'];

	if ($id == '' ){ 
	header("location: borrow.php");
	?>
	

	<?php
// Assuming you have already included dbcon.php or established a MySQL connection

if (isset($_POST['submit'])) {
    // Assuming you have sanitized or validated $member_id and $due_date
    
    // Insert into borrow table to create a new borrow record
    mysql_query("INSERT INTO borrow (member_id, date_borrow, due_date) VALUES ('$member_id', NOW(), '$due_date')") or die(mysql_error());
    
    // Retrieve the last inserted borrow_id
    $query = mysql_query("SELECT * FROM borrow ORDER BY borrow_id DESC") or die(mysql_error());
    $row = mysql_fetch_array($query);
    $borrow_id = $row['borrow_id'];
    
    // Insert into borrowdetails for each book_id in $id array
    $N = count($id);
    for ($i = 0; $i < $N; $i++) {
        $current_book_id = mysql_real_escape_string($id[$i]); // Sanitize or escape each book_id
        mysql_query("INSERT INTO borrowdetails (book_id, borrow_id, borrow_status) VALUES ('$current_book_id', '$borrow_id', 'pending')") or die(mysql_error());
    }
    
    // Redirect to borrow.php after successful insertion
    header("Location: borrow.php");
    exit();
} else {
    // Handle else condition if necessary
    echo "Form submission not detected.";
}
?>

	
	

	
	