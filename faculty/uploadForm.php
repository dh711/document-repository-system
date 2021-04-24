<?php
require_once("../classes/Database.php");
require_once("../classes/Faculty.php");

$res = "";
$courses = Faculty::getCourses();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filename = $_POST["filename"];
    $course = $_POST["course"];
    $targetDir = "../media/{$_POST['course']}/";
    
    if(!is_dir($targetDir))
        mkdir($targetDir);

    $targetFile = $targetDir . basename($_FILES["file"]["name"]);

    $upload = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if(isset($_POST["upload"])) {
        if (empty($filename)) {
            $res = "Please enter filename.<br>";
            $upload = 0;
        }
        
        if (file_exists($targetFile)) {
            $res = "Sorry, file already exists.<br>";
            $upload = 0;
        }
        
        if ($_FILES["file"]["size"] > 5000000) {
            $res = "Sorry, your file is too large.<br>";
            $upload = 0;
        }

        if($imageFileType != "pdf" && $imageFileType != "docx" && $imageFileType != "pptx") {
            $res = "Sorry, only PDF, DOCX & PPTX files are allowed.<br>";
            $upload = 0;
        }

        if (!$upload == 0) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                $res = "The file" . htmlspecialchars(basename($_FILES['file']['name'])) . " has been uploaded.";

                // Saving path to database.
                Database::connect();
                $query = "INSERT INTO coursedocuments (name, path, course_id) VALUES (?,?,?)";
                Database::query($query, "sss", array($filename, $targetFile, $course));
                Database::disconnect();
            }
            else
                $res = "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <select name="course" required>
            <option disabled selected>Select course...</option>
            <?php
                for ($i = 0; $i < count($courses); $i++) 
                    echo "<option value='{$courses[$i][0]}'>{$courses[$i][1]}</option>";
            ?>
        </select>
    </div>
    <br><br>
    <div class="form-group">
        <input type="file" name="file">
    </div>
    <br><br>
    <div class="form-group text-field">
        <input type="text" name="filename" class="" placeholder="Filename"><br>
    </div>
    <br><br>
    <input type="submit" name="upload" value="Upload">
</form>

<span class="<?php echo $res_type?'success':'error';?>"><?=$res?></span>