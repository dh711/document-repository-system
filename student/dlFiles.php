<?php
require_once("../classes/Database.php");
require_once("../classes/Student.php");

$res = "";
$courses = Student::getCourses();
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" enctype="multipart/form-data">
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
    <input type="submit" name="search" value="Search">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course = $_POST["course"];

    if(isset($_POST["search"])) {
        $docs = Student::getDocs($course);
        Student::printDocs($docs);
    }
}
?>

<span class="<?php echo $res_type?'success':'error';?>"><?=$res?></span>