<?php 
session_start();
 
if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true)
    echo "";
else
    header("Location: ../login/login.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/dashboard.css">
    <script type="text/javascript" src="../scripts/tabs.js"></script>
    <title>Faculty Dashboard</title>
</head>
<body>
    <div class="sidebar">
        <h3 class="username"><?php echo $_SESSION["username"]; ?></h3>
        <a class="tablinks" id="1" onclick="openTab(event, 'info')">Information</a>
        <a class="tablinks" id="2" onclick="openTab(event, 'courses')">Courses</a>
        <a class="tablinks" id="3" onclick="openTab(event, 'course-docs')">Course Documents</a>
        <a class="tablinks" id="4" onclick="openTab(event, 'attendance')">Attendance</a>
        <br><br>
        <a class="tablinks" href="../login/logout.php" id="4" class="bar-link">Logout</a>
    </div>

    <div class="content">
        <h2 class="page-title">Faculty Dashboard</h2>

        <div class="tabcontent display-none" id="info">
            <h2 class="sub-title">Information</h2>
            <?php 
                include_once('../common/information.php');
            ?>
        </div>

        <div class="tabcontent display-none" id="courses">
            <h2 class="sub-title">Courses</h2>
            <?php 
                
            ?>
        </div>

        <div class="tabcontent display-none" id="course-docs">
            <h2 class="sub-title">Course Documents</h2>
            <?php 
                include_once('./uploadForm.php');
            ?>
        </div>

        <div class="tabcontent display-none" id="attendance">
            <h2 class="sub-title">Attendance</h2>
        </div>
    </div>
</body>
</html>