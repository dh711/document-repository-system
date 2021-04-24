<?php
    require_once("../classes/Database.php");
    Database::connect();

    $role = $_SESSION["role"];
    $query = "SELECT * FROM $role where email_id = ?;";
    $result = Database::query($query, 's', array($_SESSION['username']));
    $result = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if ($role=="student") {
        echo('
            <table class="information">
                <tr>
                    <th align="left">ROLE</th>
                    <td>'.$role.'</td>
                </tr>
                <tr>
                    <th align="left">EMAIL ID</th>
                    <td>'.$result['email_id'].'</td>
                </tr>
                <tr>
                    <th align="left">ROLL NUMBER</th>
                    <td>'.$result['rollno'].'</td>
                </tr>
                <tr>
                    <th align="left">FIRST NAME</th>
                    <td>'.$result['first_name'].'</td>
                </tr>
                <tr>
                    <th align="left">LAST NAME</th>
                    <td>'.$result['last_name'].'</td>
                </tr>
                <tr>
                    <th align="left">ADDRESS</th>
                    <td>'.$result['address'].'</td>
                </tr>
                <tr>
                    <th align="left">PHONE NUMBER</th>
                    <td>'.$result['phone_no'].'</td>
                </tr>
                <tr>
                    <th align="left">DATE OF BIRTH</th>
                    <td>'.$result['DOB'].'</td>
                </tr>
            </table>
        ');
    }
    else if ($role == "faculty")  {
        echo('
            <table class="information">
                <tr>
                    <th align="left">ROLE</th>
                    <td colspan>'.$role.'</td>
                </tr>
                <tr>
                    <th align="left">EMAIL ID</th>
                    <td>'.$result['email_id'].'</td>
                </tr>
                <tr>
                    <th align="left">FACULTY ID</th>
                    <td>'.$result['id'].'</td>
                </tr>
                <tr>
                    <th align="left">FIRST NAME</th>
                    <td>'.$result['first_name'].'</td>
                </tr>
                <tr>
                    <th align="left">LAST NAME</th>
                    <td>'.$result['last_name'].'</td>
                </tr>
                <tr>
                    <th align="left">PHONE NUMBER</th>
                    <td>'.$result['phone_no'].'</td>
                </tr>
            </table>
        ');
    }
    Database::disconnect();
?>