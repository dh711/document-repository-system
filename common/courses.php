<?php
require_once("../classes/Student.php");
$role = $_SESSION["role"];
// $query = "SELECT * FROM $role where email_id = ?;";
// $result = Database::query($query, 's', array($_SESSION['username']));
$result = Student::getCourses();
print_r($result);
?>


