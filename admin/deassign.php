<?php
    require_once("../classes/Database.php");
    Database::connect();
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
    <div class="form-group text-field">
       <input type="text" name="rollno" placeholder='Student Roll Number' required><br><br>
    </div>
    <input type="submit" name="deassign" class="btn btn-search">
</form>


<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["deassign"])) {    
            $query = "DELETE FROM `course_student` where `student_id`=?;";
            $params = "s";
            $param_array = array($_POST["rollno"]);
            Database::query($query, $params, $param_array);
            echo "<br><div class='message-blob'>
                    <p class='message-text'>Courses Deassigned Sucessfully</p>
                </div><br>";
        }
    }
    Database::disconnect();
?>