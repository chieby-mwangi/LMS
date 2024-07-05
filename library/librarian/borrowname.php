<form method="post" action="borrow_save.php">
<div class="border-borrow">
			<div class="control-group">
				<label class="control-label" for="inputEmail">Borrower Name</label>
				<div class="controls">
				<select name="member_id" class="chzn-select" required/>
				<option></option>
				<?php
// Assuming you have already connected to your MySQL database
// Replace with your actual database connection code

// Example connection:
// $mysqli = new mysqli("localhost", "username", "password", "database");

$result = $mysqli->query("SELECT * FROM member") or die($mysqli->error);

while ($row = $result->fetch_assoc()) {
    echo '<option value="' . htmlspecialchars($row['member_id']) . '">' . htmlspecialchars($row['firstname'] . ' ' . $row['lastname']) . '</option>';
}

$result->free();
?>

				</select>
				</div>
			</div>
				<div class="control-group"> 
					<label class="control-label" for="inputEmail">Due Date</label>
					<div class="controls">
					<input type="text"  class="w8em format-d-m-y highlight-days-67 range-low-today" name="due_date" id="sd" maxlength="10" style="border: 3px double #CCCCCC;" required/>
					</div>
				</div>
				<div class="control-group"> 
					<div class="controls">
						<button class="btn btn-success" name="borrow"><i class="icon-plus"></i> Borrow</button>
						<button name="delete_student" class="btn btn-danger"><i class="icon-check icon-large"></i> Yes</button>
					</div>
				</div>
</div>
