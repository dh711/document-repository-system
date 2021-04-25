<?php
require_once("../classes/Database.php");
require_once("../classes/Faculty.php");

$res = "";
$courses = Faculty::getCourses();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["upload"])) {
        $filename = isset($_POST["filename"])?$_POST["filename"]:"";
        $course = isset($_POST["course"])?$_POST["course"]:"";
        if (empty($course)){
            $targetDir="";
            $res = "<p>Please choose a course!</p>";
            $upload = 0;
        }
        else {
            $targetDir = "../media/{$_POST['course']}/";
            if(!is_dir($targetDir))
            {
                mkdir($targetDir);
            }
             

            $targetFile = $targetDir . basename($_FILES["file"]["name"]);

            $upload = 1;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        
            if (empty($filename)) {
                $res = "<p>Please enter a valid filename.</p>";
                $upload = 0;
            }
            
            if (file_exists($targetFile)) {
                $res = "<p>Sorry, file already exists.</p>";
                $upload = 0;
            }
            
            if ($_FILES["file"]["size"] > 5000000) {
                $res = "<p>Sorry, your file is too large.</p>";
                $upload = 0;
            }

            if($imageFileType != "pdf" && $imageFileType != "docx" && $imageFileType != "pptx") {
                $res = "<p>Sorry, only PDF, DOCX & PPTX files are allowed.</p>";
                $upload = 0;
            }

            if (!$upload == 0) {
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                    $res = "<p>The file " . htmlspecialchars(basename($_FILES['file']['name'])) . " has been uploaded.</p>";

                    // Saving path to database.
                    Database::connect();
                    $query = "INSERT INTO coursedocuments (name, path, course_id) VALUES (?,?,?)";
                    Database::query($query, "sss", array($filename, $targetFile, $course));
                    Database::disconnect();
                }
                else
                    $res = "<p>Sorry, there was an error uploading your file.</p>";
            }
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
        <input type="file" name="file" class="file-btn" id="file">
    </div>
    <br><br>
    <div class="form-group text-field">
        <input type="text" name="filename" class="" placeholder="Filename"><br>
    </div><br>
    <input type="submit" name="upload" value="Upload" class="btn btn-search">
</form>

<?php 
if (isset($_POST["upload"])) {
    echo "<br><div class="; echo $upload?'message-blob':'message-blob-error'; echo">$res</div>";
}
?>