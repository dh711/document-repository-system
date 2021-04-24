<?php
require_once("../classes/Database.php");
require_once("../classes/Student.php");

$courses = Student::getCourses();
$messages = array();
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
    <input type="submit" name="receive" value="Get messages" class="btn btn-search">
</form>
<br>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["receive"])) {
        $course = isset($_POST["course"])?$_POST["course"]:"";
        $query = "SELECT message FROM messages WHERE course_id = ? ORDER BY message_id DESC;";
        
        Database::connect();
        $result = Database::query($query, 's', array($course));
        while ($row = mysqli_fetch_row($result)) {
            array_push($messages, $row[0]);
        }
        Database::disconnect();

        if (empty($messages))
            echo "<div class='message-blob-error'>
                    <p class='message-text'>No messages found!</p>
                </div><br>";
        else {
            for ($i = 0; $i < count($messages); $i++) {
                echo "<div class='message-blob'>
                            <p class='message-text'>{$messages[$i]}</p>
                        </div><br>";
            }
        }
        
    }
}
?>