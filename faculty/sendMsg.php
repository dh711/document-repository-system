<?php
require_once("../classes/Database.php");
require_once("../classes/Faculty.php");

$res = "";
$courses = Faculty::getCourses();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["send"])) {
        $course = isset($_POST["course"])?$_POST["course"]:"";
        $msg = isset($_POST["msg"])?$_POST["msg"]:"";
        $query = "INSERT INTO messages (message, course_id) VALUES (?, ?);";
        
        Database::connect();
        Database::query($query, 'ss', array($msg, $course));
        Database::disconnect();
        $res = "Message sent!";
    }
}
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" id="msg-form">
    <div class="form-group">
        <select name="course" required>
            <option disabled selected>Select course...</option>
            <?php
                for ($i = 0; $i < count($courses); $i++) 
                    echo "<option value='{$courses[$i][0]}'>{$courses[$i][1]}</option>";
            ?>
        </select>
    </div>
    <br><br>
    <div class="msg-group">
        <textarea name="msg" class="msg" rows="14" cols="100" form="msg-form"></textarea>
    </div>
    <input type="submit" name="send" value="Send" class="btn btn-search">
</form>
<br>
<span class="success"><?=$res?></span>