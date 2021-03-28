<?php 
session_start();
 
if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true)
    echo $_SESSION["username"];
else
    header("Location: ../login/login.php");

echo "Student Dashboard";
echo "<a href='../login/logout.php'>logout?</a>";
?>