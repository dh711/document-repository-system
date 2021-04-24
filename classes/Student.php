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
    
    public static function getDocs($courseID) {
        $docs = array();
        $query = "SELECT name, path FROM coursedocuments WHERE course_id=?";

        Database::connect();
        $result = Database::query($query, "s", array($courseID));
        while ($row = mysqli_fetch_row($result)) {
            array_push($docs, array($row[0], $row[1]));
        }
        Database::disconnect();
        return $docs;
    }

    public static function printDocs($docs) {
        echo "<table>
                <tr><th>Documents</th></tr>";
                for ($i = 0; $i < count($docs); $i++) {
                    echo "<tr><td><a href='{$docs[$i][1]}'>{$docs[$i][0]}</a></td></tr>";
                }
        echo " </table>";
    }
}

?>