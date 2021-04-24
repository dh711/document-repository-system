<?php
require_once("../classes/Database.php");
require_once("../classes/Faculty.php");

Faculty::getCourses();
?>

<!-- <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" enctype="multipart/form-data">
    
    
    <label for="uploadedImg"> Upload image:
    <input type="file" name="uploadedImg" id="uploadedImg">
    </label>
    <br><br>
    <input type="submit" name="upload" value="Upload">
</form> -->