<?php 
session_start();
 
if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true) {
    header("Location: ./" . $_SESSION['role'] . "/index.php");
} else {
    header("Location: ./login/login.php");
}
?>
