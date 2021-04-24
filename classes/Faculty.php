<?php

class Faculty {
    public static function getCourses() {
        $courses = array();
        $query = "SELECT course.id, course.name FROM course INNER JOIN teacher_course INNER JOIN faculty ON teacher_course.course_id = course.id WHERE faculty.email_id = ?;";
        
        Database::connect();
        $result = Database::query($query, "s", array($_SESSION['username']));
        while ($row = mysqli_fetch_row($result)) {
            array_push($courses, array($row[0], $row[1]));
        }
        print_r($courses);
        Database::disconnect();
        return $courses;
    }
}

?>