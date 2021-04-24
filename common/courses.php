<?php
    $role = $_SESSION["role"];
    
    if ($role == "student") {
        require_once("../classes/Student.php");
        $courses = Student::getCourses();
    }
    else {
        require_once("../classes/Faculty.php");
        $courses = Faculty::getCourses();
    }
    
    if (empty($courses)) {
        echo "<div class='message-blob-error'>
                    <p class='message-text'>No courses found!</p>
                </div><br>";
    }
    else {
        echo '<div class="square-container">';
        for ($i = 0; $i < count($courses); $i++) {
            echo '<div class="square">
                        <div class="content">
                            <span class="course-code">'.$courses[$i][0].'</span><br>
                            <span class="course-name">'.$courses[$i][1].'</span>
                        </div>
                    </div>';
        }
        echo '</div>';
    }

?>


<!-- 
<table border="1">
    <tr>
        <th colspan="2"><?php echo $role ?> Courses</th>
    </tr>
    <tr>
        <th>Code</th>
        <th>Name</th>
    </tr>

<?php
    foreach ($result as $value) {
?>
    <tr>
       <td><?php echo $value[0]; ?></td>
       <td><?php echo $value[1]; ?></td>
    </tr>
    <br>
<?php
    }
?>
</table> -->


