<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require_once './Database.php';
            print(Database::connect());
            
            $query = "INSERT INTO `student` VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $paramType = "ssssssss";
            $params = array("18bce057", "Dhwanil", "Ditani", "Ahmedabad, Gujarat, India", "7359047969", "2001-04-13", "18bce057@nirmauni.ac.in", password_hash("password_57", PASSWORD_DEFAULT));
            list($result, $error) = Database::query($query, $paramType, $params);
            if (empty($error)) {
                print("Query 1 execution success");
            }
            else {
               print("Query 1 failed");
            }
            $query = "INSERT INTO `faculty` VALUES (?, ?, ?, ?, ?, ?)";
            $paramType = "ssssss";
            $params = array("12345", "Clark", "Kent", "clarkkent@dailybugle.com", "1234567890", password_hash("loislane", PASSWORD_DEFAULT));
            list($result, $error) = Database::query($query, $paramType, $params);
            if (empty($error)) {
                print("Query 2 execution success");
            }
            else {
                print("Query 2 failed");
            }
            
            
            $query = "SELECT * FROM `student`";
            list($result1, $error1) = Database::query($query);
//            
//            $query = "SELECT * FROM `faculty`";
//            list($result2, $error2) = Database::query($query);
//            
//            $data = mysqli_fetch_array($result1, MYSQLI_ASSOC);
//            echo ("<br><pre>");
//            print_r($data);
//            echo ("</pre><br>");
//            print("<br>Error: ".$error1."<br>");
//            
//            $data = mysqli_fetch_array($result2, MYSQLI_ASSOC);
//            echo ("<br><pre>");
//            print_r($data);
//            echo ("</pre><br>");
//            print("<br>Error: ".$error2."<br>");
            
            Database::disconnect();
            
        ?>
    </body>
</html>
