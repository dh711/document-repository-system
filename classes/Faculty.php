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
        // print_r($courses);
        Database::disconnect();
        return $courses;
    }

    public static function getDocs($courseID) {
        $docs = array();
        $query = "SELECT name, path, id, course_id FROM coursedocuments WHERE course_id=?";

        Database::connect();
        $result = Database::query($query, "s", array($courseID));
        while ($row = mysqli_fetch_row($result)) {
            array_push($docs, array($row[0], $row[1], $row[2], $row[3]));
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

        echo "<br><table class='docs' style='width: 100%'>
                <tr class='doc-head'><th align='left' style='width: 35%'>Documents available...</th><td></td></tr>
                <tr></tr><tr></tr><tr></tr><tr></tr>";
                for ($i = 0; $i < count($docs); $i++) {
                    echo "<tr><td><img src='../icons/docs.png' width='16px'>&nbsp;&nbsp;<a href='{$docs[$i][1]}'>{$docs[$i][0]}</a></td><td><a href='delete.php?id={$docs[$i][2]}&course_id={$docs[$i][3]}&name={$docs[$i][1]}'><img src='../icons/delete.png' width='16px'></a></td></tr><tr></tr><tr></tr>";
                }
        echo " </table>";
    }
}

?>