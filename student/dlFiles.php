<?php
require_once("../classes/Database.php");
require_once("../classes/Student.php");

$res = "";
$courses = Student::getCourses();
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
    <input type="submit" name="search" value="Search" class="btn btn-search">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["search"])) {
        $course = isset($_POST["course"])?$_POST["course"]:"";
        $docs = Student::getDocs($course);
        Student::printDocs($docs);
    }
}
?>