<?php
    require_once("../classes/Database.php");
    Database::connect();
    $role = $_SESSION["role"];
    $res="";
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" id="usrform">
    <div class="form-group text-field">
       <input type="text" name="fname" placeholder='First Name' required><br><br>
       <input type="text" name="lname" placeholder='Last Name' required><br><br>
       <input type="text" name="rollno" placeholder='Roll No.' required><br><br>
       <textarea rows="4" cols="50" name="address" form="usrform" placeholder='Address' required>Enter Address</textarea><br><br>     
       <input type="number" name="phno" placeholder='Phone number'  required><br><br>
       <input type="date" name="DOB"  required><br><br>
       <input type="text" name="email" placeholder='Email'  required><br><br>
       <input type="password" name="pwd" placeholder='Password'  required><br>
    </div>
    <input type="submit" name="sub"   class="btn btn-search">
</form>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["sub"])) {
            $query = "INSERT INTO `student` VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
            $params = "ssssisss";
            $param_array = array($_POST["rollno"], $_POST["fname"], $_POST["lname"], $_POST["address"],$_POST["phno"], $_POST["DOB"], $_POST["email"], password_hash($_POST["pwd"], PASSWORD_DEFAULT));
            $res=Database::query($query, $params, $param_array);
            echo "<br><div class='message-blob'>
                    <p class='message-text'>Student Added Sucessfully</p>
                </div><br>";
        }
    }
    Database::disconnect();
?>