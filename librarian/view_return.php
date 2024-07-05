<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_borrow.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">	
				<div class="span12">		
						<div class="alert alert-info"><strong>Borrowed Books</strong></div>
                            <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">

                                <thead>
                                    <tr>
                                        <th>Book title</th>                                 
                                        <th>Borrower</th>                                 
                                        <th>Year Level</th>                                 
                                        <th>Date Borrow</th>                                 
                                        <th>Due Date</th>                                
                                        <th>Date Returned</th>
										<th>Borrow Status</th>
                                    </tr>
                                </thead>
                                <tbody>
								 
                                <?php
include('dbcon.php'); // Include your database connection details here

// Query to retrieve data from multiple tables using mysqli
$user_query = mysqli_query($mysqli, "SELECT * FROM borrow
                                     LEFT JOIN member ON borrow.member_id = member.member_id
                                     LEFT JOIN borrowdetails ON borrow.borrow_id = borrowdetails.borrow_id
                                     LEFT JOIN book ON borrowdetails.book_id = book.book_id
                                     ORDER BY borrow.borrow_id DESC") or die(mysqli_error($mysqli));

while ($row = mysqli_fetch_array($user_query)) {
    $borrow_id = $row['borrow_id'];
    $book_id = $row['book_id'];
    $borrow_details_id = $row['borrow_details_id'];

    // Output or process each row of data as needed
    echo "Borrow ID: " . $borrow_id . "<br>";
    echo "Book ID: " . $book_id . "<br>";
    echo "Borrow Details ID: " . $borrow_details_id . "<br>";

    // You can access other columns as needed, e.g., $row['firstname'], $row['title'], etc.
}

// Close the database connection
mysqli_close($mysqli);
?>

									<tr class="del<?php echo $id ?>">
									
									                              
                                    <td><?php echo $row['book_title']; ?></td>
                                    <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
                                    <td><?php echo $row['year_level']; ?></td>
									<td><?php echo $row['date_borrow']; ?></td> 
                                    <td><?php echo $row['due_date']; ?> </td>
									<td><?php echo $row['date_return']; ?> </td>
									<td><?php echo $row['borrow_status'];?></td>
									<td> <a rel="tooltip"  title="Return" id="<?php echo $borrow_details_id; ?>" href="#delete_book<?php echo $borrow_details_id; ?>" data-toggle="modal"    class="btn btn-success"><i class="icon-check icon-large"></i>Return</a>
                                    <?php include('modal_return.php'); ?>
                                    <td></td> 
									 
                                    </tr>
									<?php  }  ?>
                                </tbody>
                            </table>
							

			</div>		
	
<script>		
$(".uniform_on").change(function(){
    var max= 3;
    if( $(".uniform_on:checked").length == max ){
	
        $(".uniform_on").attr('disabled', 'disabled');
		         alert('3 Books are allowed per borrow');
        $(".uniform_on:checked").removeAttr('disabled');
		
    }else{

         $(".uniform_on").removeAttr('disabled');
    }
})
</script>		
			</div>
		</div>
    </div>
<?php include('footer.php') ?>