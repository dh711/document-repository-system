<?php 
session_start();
 
// if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true)
//     echo $_SESSION["username"];
// else
//     header("Location: ../login/login.php");
?>

<!DOCTYPE html>
<html lang="en" class="overflow-hidden">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/admin.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap">
    <script type="text/javascript" src="../scripts/tabs.js"></script>
</head>
<body>
<div class="sidebar">
        <h3 class="username"><?php echo $_SESSION["username"]; ?></h3>
        <a class="tablinks" id="1" onclick="openTab(event, 'courses')">Courses</a>
        <a class="tablinks" id="2" onclick="openTab(event, 'course-docs')">Course Documents</a>
        <a class="tablinks" id="3" onclick="openTab(event, '')">Link 1</a>
        <a class="tablinks" href="../login/logout.php" id="4" class="bar-link">Logout</a>
    </div>
    <div class="content">
        <h2 class="page-title">Admin Console.</h2>

        <div class="tabcontent display-none" id="courses">
            <h2 class="sub-title">Courses</h2>
        </div>

        <div class="tabcontent display-none" id="course-docs">
            <h2 class="sub-title">Course Documents</h2>
        </div>
    </div> 
</body>
</html>