<?php
require_once("classes/Database.php");

// header("location:welcome.php");

Database::connect();

$query = "INSERT INTO `student` VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
$params = "ssssisss";
$param_array = array("18BCE049", "Dhairya", "Tiwari", "Sharjah, UAE", 8128887225, "2000-12-26", "dhairya711@gmail.com", password_hash("abcde12345", PASSWORD_DEFAULT));
Database::query($query, $params, $param_array);

// $query = "INSERT INTO `faculty` VALUES (?, ?, ?, ?, ?, ?);";
// $params = "ssssss";
// $param_array = array("12345", "Clark", "Kent", "clarkkent@dailybugle.com", "1234567890", password_hash("loislane", PASSWORD_DEFAULT));
// Database::query($query, $params, $param_array);

// $query = "SELECT * FROM `student` WHERE 1=?;";
// $result = Database::query($query, "i", array(1));
// print_r(mysqli_fetch_array($result, MYSQLI_ASSOC));

Database::disconnect();
?>