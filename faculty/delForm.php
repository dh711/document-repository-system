<?php
require_once("../classes/Database.php");
require_once("../classes/Faculty.php");

$res = "";
$courses = Faculty::getCourses();
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
    <div class="form-group">
        <select name="course" class="dropdown" required>
            <option disabled class="dropdown-content"selected>Select course...</option>
            <?php
                for ($i = 0; $i < count($courses); $i++) 
                    echo "<option class='dropdown-content' value='{$courses[$i][0]}'>{$courses[$i][1]}</option>";
            ?>
        </select>
    </div>
    <input type="submit" name="del_search" value="Search" class="btn btn-search">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["del_search"])) {
        $course = isset($_POST["course"])?$_POST["course"]:"";
        $docs = Faculty::getDocs($course);
        Faculty::printDocs($docs);
    }
}
else {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $msg = $_GET["msg"];
        if ($msg == "success"){
            echo "<br><div class='message-blob'>
                        <p class='message-text'>File deleted!</p>
                    </div><br>";
        }
        else {
            echo "<br><div class='message-blob-error'>
                        <p class='message-text'>Error in deleting file, please try again later!</p>
                    </div><br>";
        }
    }
}
?>