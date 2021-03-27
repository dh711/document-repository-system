<?php
session_start();

if(!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] !== true){
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome</h1>
    <a href="./logout.php">logout?</a>
</body>
</html>