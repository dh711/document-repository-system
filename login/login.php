<?php 
session_start();
 
if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true)
    header("Location: ../$role/index.php");

require_once("../classes/Database.php");

$username = $password = $role = "";
$username_err = $password_err = $role_err = $login_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } 
    else {
        $username = trim($_POST["username"]);
    }
    
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } 
    else {
        $password = trim($_POST["password"]);
    }

    if (!isset($_POST["role"])) {
        $role_err = "Please enter your role.";
    } 
    else {
        $role = $_POST["role"];
    }
    
    if(empty($username_err) && empty($password_err) && empty($role_err)) {
        $query = "SELECT `email_id`, `password` FROM `$role` WHERE `email_id` = ?";
        
        Database::connect();
        $result = Database::query($query, "s", array($username));
        
        if (mysqli_num_rows($result) === 0) {
            $login_err = "Invalid username.";
        }
        else {
            $result_arr = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if(password_verify($password, $result_arr['password'])) {
                session_start();
                                
                $_SESSION["loggedIn"] = true;
                $_SESSION["username"] = $username;
                $_SESSION["role"] = $role;                      
                
                header("Location: ../$role/index.php");
            } 
            else {
                $login_err = "Invalid username or password.";
            }
        }

        Database::disconnect();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap">
</head>
<body>
    <div class="form">
        <div class="title">Login</div>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
            <div class="form-group text-field">
                <input type="text" name="username" value="<?=$username?>" class="" placeholder="Username"><br>
                <div class="<?php echo (!empty($username_err)) ? '' : 'display-none'; ?>"><?php echo "<p class='alert'>" . $username_err . "</p>"; ?></div>
            </div>    
            <div class="form-group text-field">
                <input type="password" name="password" value="<?=$password?>" class="" placeholder="Password"><br>
                <div class="<?php echo (!empty($password_err)) ? '' : 'display-none'; ?>"><?php echo "<p class='alert'>" . $password_err . "</p>"; ?></div>
            </div>
            <div class="form-group radio">
                <input type="radio" name="role" value="student" class=""><label class="radio-label"> STUDENT</label>
                <input type="radio" name="role" value="faculty" class=""><label class="radio-label"> FACULTY</label><br>
                <div class="<?php echo (!empty($role_err)) ? '' : 'display-none'; ?>"><?php echo "<p class='alert'>" . $role_err . "</p>"; ?></div>
            </div>
            <?php 
                if(!empty($login_err))
                    echo '<div class="alert">' . $login_err . '</div><br>';
            ?>
            <div class="btn"><input type="submit" class="btn-login" value="LOGIN"></div>
        </form>


    </div>
</body>
</html>