<?php

class Student {
    public static function getCourses() {
        $courses = array();
        $query = "SELECT course.id, course.name FROM course INNER JOIN course_student INNER JOIN student ON course_student.course_id = course.id WHERE student.email_id = ?;";
        
        Database::connect();
        $result = Database::query($query, "s", array($_SESSION['username']));
        while ($row = mysqli_fetch_row($result)) {
            array_push($courses, array($row[0], $row[1]));
        }
        Database::disconnect();
        return $courses;
    }
}

?>