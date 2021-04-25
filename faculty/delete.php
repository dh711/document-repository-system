<?php
require_once("../classes/Database.php");
require_once("../classes/Faculty.php");

$id = $_GET['id'];
$course_id = $_GET['course_id'];
$name = $_GET['name'];
$query = "DELETE FROM coursedocuments WHERE id=?";


if(unlink("$name")) { 
    Database::connect();
    $query = "DELETE FROM coursedocuments WHERE id=?";
    Database::query($query, 's', array($id));
    Database::disconnect();
    header('Location: ./index.php?activeTab=4&msg=success'); 
    exit;
}
else {
    header('Location: ./index.php?activeTab=4&msg="error"'); 
    exit;
}
?>