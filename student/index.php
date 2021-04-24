<?php 
session_start();
 
if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true)
    echo "";
else
    header("Location: ../login/login.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['search'])) {
        $activeTab = 3;
    }
    if (isset($_POST['receive'])) {
        $activeTab = 4;
    }

}
else {
    $activeTab = 1;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/dashboard.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <script type="text/javascript" src="../scripts/tabs.js"></script>
    <title>Student Dashboard</title>
</head>
<body onload="document.getElementById('<?php echo $activeTab ?>').click()">
    <div class="sidebar">
        <h3 class="username"><?php echo $_SESSION["username"]; ?></h3><br>
        <a class="tablinks" id="1" onclick="openTab(event, 'info')">Information</a>
        <a class="tablinks" id="2" onclick="openTab(event, 'courses')">Courses</a>
        <a class="tablinks" id="3" onclick="openTab(event, 'course-docs')">Course Documents</a>
        <a class="tablinks" id="4" onclick="openTab(event, 'msg')">Messages</a>
        <br><br>
        <a class="tablinks" href="../login/logout.php" id="4" class="bar-link">Logout</a>
    </div>

        <div class="content">
            <h2 class="page-title">Student Dashboard</h2>

        <div class="tabcontent active" id="info">
            <h2 class="sub-title">General Information.</h2>
            <?php 
                include_once('../common/information.php');
            ?>
        </div>

            <div class="courses tabcontent display-none" id="courses">
                <h2 class="sub-title">Courses enrolled.</h2>
                <?php 
                    include_once('../common/courses.php');
                ?>
            </div>

        <div class="courses tabcontent display-none" id="course-docs">
            <h2 class="sub-title">Course Documents.</h2>
            <?php 
                include_once('./dlFiles.php');
            ?>
        </div>

        <div class="messages tabcontent display-none" id="msg">
            <h2 class="sub-title">Messages.</h2>
            <?php 
                include_once('./getMsg.php');
            ?>
        </div>
    </body>
</html>