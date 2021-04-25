<?php 
session_start();
 
if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true)
    echo "";
else
    header("Location: ../login/login.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['sub'])) {
        $activeTab = 1;
    }
    // if (isset($_POST['receive'])) {
    //     $activeTab = 4;
    // }

}
else {
    $activeTab = 1;
}
?>

<!DOCTYPE html>
<html lang="en" class="overflow-hidden">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/dashboard.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <script type="text/javascript" src="../scripts/tabs.js"></script>
</head>
<body onload="document.getElementById('<?php echo $activeTab ?>').click()">
<div class="sidebar">
        <h3 class="username"><?php echo $_SESSION["username"];?></h3>
        <a class="tablinks" id="1" onclick="openTab(event, 'add')">Add Students</a>
        <a class="tablinks" id="2" onclick="openTab(event, 'assign')">Assign Course</a>
        <a class="tablinks" id="3" onclick="openTab(event, '')">Link 1</a>
        <a class="tablinks" href="../login/logout.php" id="4" class="bar-link">Logout</a>
    </div>
    <div class="content">
        <h2 class="page-title">Admin Console.</h2>

        <div class="tabcontent display-none" id="add">
            <h2 class="sub-title">Add Students</h2>
            <?php 
                include_once('./add.php');
            ?>
        </div>

        <div class="tabcontent display-none" id="assign">
            <h2 class="sub-title">Assign Course</h2>
            <?php 
                include_once('./assign.php');
            ?>
        </div>
    </div> 
</body>
</html>