<?php
require_once("../classes/Database.php");

Database::connect();


$role = $_SESSION["role"];
$query = "SELECT * FROM $role where email_id = ?;";
$result = Database::query($query, 's', array($_SESSION['username']));
$result = mysqli_fetch_array($result, MYSQLI_ASSOC);

if ($role=="student") {
    echo('
    <center>
        <table border="1">
            <tr>
                <th colspan="2">'.$role.' Information</th>
            </tr>
            <tr>
                <td colspan="2">'.$result['email_id'].'</td>
            </tr>
            <tr>
                <td>Roll No.</td>
                <td>'.$result['rollno'].'</td>
            </tr>
            <tr>
                <td>First Name</td>
                <td>'.$result['first_name'].'</td>
            </tr>
            <tr>
                <td>Middle Name</td>
                <td>'.$result['last_name'].'</td>
            </tr>
            <tr>
                <td>Address</td>
                <td>'.$result['address'].'</td>
            </tr>
            <tr>
                <td>Phone No.</td>
                <td>'.$result['phone_no'].'</td>
            </tr>
            <tr>
                <td>D.O.B.</td>
                <td>'.$result['DOB'].'</td>
            </tr>
    ');
}
else if ($role == "faculty")  {
    echo('
    <center>
        <table border="1">
            <tr>
                <th colspan="2">'.$role.' Information</th>
            </tr>
            <tr>
                <td colspan="2">'.$result['email_id'].'</td>
            </tr>
            <tr>
                <td>Roll No.</td>
                <td>'.$result['id'].'</td>
            </tr>
            <tr>
                <td>First Name</td>
                <td>'.$result['first_name'].'</td>
            </tr>
            <tr>
                <td>Middle Name</td>
                <td>'.$result['last_name'].'</td>
            </tr>
            <tr>
                <td>Phone No.</td>
                <td>'.$result['phone_no'].'</td>
            </tr>
    ');
}
Database::disconnect();
?>