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
    <link rel="stylesheet" href="../styles/sidebar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap">
</head>
<body>
    <div class="sidebar">
        <h3 class="username"><?php echo $_SESSION["username"]; ?></h3>
        <a href="#" class="bar-link">Link 1</a>
        <a href="#" class="bar-link">Link 2</a>
        <a href="#" class="bar-link">Link 3</a>
        <a href="../login/logout.php" class="bar-link">Logout</a>
    </div>

    <div class="content">
        <h2 class="page-title">Admin Console.</h2>
    </div> 
</body>
</html>