<!DOCTYPE html>
<html>
<body>
    <form  method="POST" enctype="multipart/form-data">
    <link rel="stylesheet" href="tableStyling.css">
        <center style="margin-top: 30px;" id="chooseFile">
        <!-- Choose and upload file from your computer -->
            <input type="file" value="Select File" name="audioFile" multiple="multiple"/>
            <input type="submit" value="Upload File" name="save_audio"/>
            <!-- Set a category -->
            <select name="cat">
                <option value="Alternative">Alternative</option>
                <option value="Classical">Classical</option>
                <option value="Hip-Hop/Rap">Hip-Hop/Rap</option>
                <option value="Electronic">Electronic</option>
                <option value="R&B/Soul">R&B/Soul</option>
                <option value="Reggae">Reggae</option>
                <option value="Rock">Rock</option>
                <option value="World">World</option>
            </select>
        </center>
        <center id="mediaDisplay">
        <?php 
        // hides arror reports as errors appear for the if statement as there is no name variable yet unless you click on the hyperlink
        error_reporting(1);
        ?>
        <!-- if the file name contains .mp4 then it knows its a video file and displays the video controls. if it doesnt contain the .mp4 then it plays as a audio -->
            <?php if (strpos($_GET['name'], '.mp4') !== false){ ?>   
                <video controls width='800' height='450'>
                    <source src="uploads/<?php echo $_GET['name']; ?>" type="video/mp4">
                </video>     
                <button type="submit" name="deleteMedia">delete</button>
            <?php } else { ?>
                <audio controls>
                    <source src="uploads/<?php echo $_GET['name']; ?>" type="audio/mpeg">
                </audio>
                <!-- delete file button -->
                <button type="submit" name="deleteMedia">delete</button>
            <?php } ?>
        </center>
        <!-- to display the table of media files -->
        <?php
        include 'displayTable.php';
        ?>
    </form>
</body>
</html>