<?php
    require_once("../classes/Student.php");
    $role = $_SESSION["role"];
    $result = Student::getCourses();
?>

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
</table>


