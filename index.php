<!DOCTYPE html>
<html>
<body>
    <form  method="POST" enctype="multipart/form-data">
    <link rel="stylesheet" href="tableStyling.css">
        <!-- included to the tableList() can be used -->
        <?php
        include 'tableList.php';
        include 'select.php';
        ?>

        <center style="margin-top: 30px;" id="chooseFile">
            <input type="file" value="Select File" name="audioFile" multiple="multiple"/>
            <input type="submit" value="Upload File" name="save_audio"/>
        </center>
        <!-- php if statement checks incoming name if it contains the .wav file type -->
        <!-- if it does then audio tags are produced. -->
        <!-- if not then the video tags are displayed. -->
        <!-- i have been able to create an if statement with fully working "src php" statement by opening brackets then closing them after the HTML -->
        <!-- this gives me the ability to switch between showing video and audio which take up different amounts of the page so reduces random gaps on the page -->
        <center id="mediaDisplay">
            <?php if (strpos($_GET['name'], '.wav') !== false){ ?>        
                <audio controls>
                    <source src="<?php echo $_GET['name']; ?>" type="audio/mpeg">
                </audio>
            <?php } else { ?>
                <video controls width='800' height='450'>
                    <source src="<?php echo $_GET['name']; ?>" type="video/mp4">
                </video>
            <?php } ?>
        </center>
        <!-- displays db with a table (code in tableList.php) -->
        <?php
        tableList();
        ?>
    </form>
</body>
</html>