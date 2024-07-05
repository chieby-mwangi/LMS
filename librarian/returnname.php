<form class="form-horizontal" method="post">
    <div class="control-group">
        <label class="control-label" for="memberName">Member Name</label>
        <div class="controls">
            <select name="member_name" id="memberName">
                <option value=""></option>
                <?php
                $mysqli = new mysqli("your_host", "your_username", "your_password", "your_database");

                if ($mysqli->connect_error) {
                    die("Connection failed: " . $mysqli->connect_error);
                }

                $result = $mysqli->query("SELECT * FROM member");

                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row['member_id'] . '">' . $row['firstname'] . ' ' . $row['lastname'] . '</option>';
                }

                $mysqli->close();
                ?>
            </select>
        </div>
    </div>
    <div class="control-group"> 
        <label class="control-label" for="dueDate">Due Date</label>
        <div class="controls">
            <input type="date" name="due_date" id="dueDate" style="border: 3px double #CCCCCC;" required/>
        </div>
    </div>
    <div class="control-group"> 
        <label class="control-label" for="returnDate">Return Date</label>
        <div class="controls">
            <input type="date" name="return_date" id="returnDate" style="border: 3px double #CCCCCC;" required/>
        </div>
    </div>
</form>
