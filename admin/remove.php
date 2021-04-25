<?php
    require_once("../classes/Database.php");
    Database::connect();
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" >
    <div class="form-group text-field">
       <input type="text" name="rollno" placeholder='Roll No.' required><br><br>
    </div>
    <input type="submit" name="remove"   class="btn btn-search">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["remove"])) {
        $query = "DELETE FROM `student` where `rollno`=?;";
        $params = "s";
        $param_array = array($_POST["rollno"]);
        Database::query($query, $params, $param_array);
        echo "<br><div class='message-blob'>
                <p class='message-text'>Student Removed Sucessfully</p>
            </div><br>";
    }
}
Database::disconnect();
?>