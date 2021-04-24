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
        if (empty($docs)) {
            echo "<br><div class='message-blob-error'>
                    <p class='message-text'>No documents found!</p>
                </div><br>";
                return;
        }

        echo "<br><table class='docs'>
                <tr class='doc-head'><th align='left'>Documents available...</th></tr>
                <tr></tr><tr></tr><tr></tr><tr></tr>";
                for ($i = 0; $i < count($docs); $i++) {
                    echo "<tr><td><img src='../icons/docs.png' width='16px'>&nbsp;&nbsp;<a href='{$docs[$i][1]}'>{$docs[$i][0]}</a></td></tr><tr></tr><tr></tr>";
                }
        echo " </table>";
    }
}

?>