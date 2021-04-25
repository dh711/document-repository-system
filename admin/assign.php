<?php
    require_once("../classes/Database.php");
    Database::connect();
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" id="usrform">
    <div class="form-group text-field">
       <input type="text" name="rollno" placeholder='Student Roll Number' required><br><br>
       <input type="number" name="sem" placeholder='SEM NUMBER' required><br><br>
    </div>
    <input type="submit" name="assign" class="btn btn-search">
</form>


<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["assign"])) {
            $sem = $_POST["sem"];
            $rollno = $_POST["rollno"];
            
            $query = "INSERT  IGNORE into `course_student` select `id`,`rollno` from `course` natural join `student` where `semester`=? and `rollno`=?;";
            $params = "is";
            $param_array = array($sem, $rollno);
            Database::query($query, $params, $param_array);
            echo "<br><div class='message-blob'>
                    <p class='message-text'>Courses Assigned Sucessfully</p>
                </div><br>";
        }
    }
    Database::disconnect();
?>