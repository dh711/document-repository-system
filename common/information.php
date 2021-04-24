<?php
require_once("../classes/Database.php");

Database::connect();

print_r($_SESSION);
$role = $_SESSION["role"];
$query = "SELECT * FROM $role where email_id = ?;";
$result = Database::query($query, 's', array($_SESSION['username']));
$result = mysqli_fetch_array($result, MYSQLI_ASSOC);
var_dump($result);

Database::disconnect();
?>