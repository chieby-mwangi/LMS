<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_archive.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">	
						<!--  -->
								    <ul class="nav nav-pills">
										<li   class="active"><a href="archive.php">Archive</a></li>
									
									</ul>
						<!--  -->
						<center class="title">
						<h1>Books List</h1>
						</center>
                            <table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
								<div class="pull-right">
								<a href="" onclick="window.print()" class="btn btn-info"><i class="icon-print icon-large"></i> Print</a>
								</div>
							
                                <thead>
                                    <tr>
									    <th>Acc No.</th>                                 
                                        <th>Book Title</th>                                 
                                        <th>Category</th>
										<th>Author</th>
										<th class="action">copies</th>
										<th>Book Pub</th>
										<th>Publisher Name</th>
										<th>ISBN</th>
										<th>Copyright Year</th>	
                                    </tr>
                                </thead>
                                <tbody>
								 
								<?php
// Assuming you have already established a MySQL connection

// Query to retrieve archived books
$user_query = mysql_query("SELECT * FROM book WHERE status = 'Archive'") or die(mysql_error());

while ($row = mysql_fetch_array($user_query)) {
    $id = $row['book_id'];  
    $cat_id = $row['category_id'];

    // Query to fetch category details for the current book
    $cat_query = mysql_query("SELECT * FROM category WHERE category_id = '$cat_id'") or die(mysql_error());
    $cat_row = mysql_fetch_array($cat_query);

    // Output or process the retrieved data
    echo "Book ID: " . $id . "<br>";
    echo "Book Title: " . $row['book_title'] . "<br>";
    echo "Author: " . $row['author'] . "<br>";
    echo "Category: " . $cat_row['classname'] . "<br>";
    echo "<hr>";
}

// Close MySQL connection after use (if not using PDO)
mysql_close($connection);
?>

									<tr class="del<?php echo $id ?>">
                                    <td><?php echo $row['book_id']; ?></td>
                                    <td><?php echo $row['book_title']; ?></td>
									<td><?php echo $cat_row ['classname']; ?> </td>
                                    <td><?php echo $row['author']; ?> </td> 
                                    <td class="action"><?php echo $row['book_copies']; ?> </td>
                                     <td><?php echo $row['book_pub']; ?></td>
									 <td><?php echo $row['publisher_name']; ?></td>
									 <td><?php echo $row['isbn']; ?></td>
									 <td><?php echo $row['copyright_year']; ?></td>		
							
									
                                    </tr>
									<?php  }  ?>
                           
                                </tbody>
                            </table>
							
			
			</div>		
			</div>
		</div>
    </div>
<?php include('footer.php') ?>