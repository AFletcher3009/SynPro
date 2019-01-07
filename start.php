<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Select File</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="tableStyling.css">
    <script src="main.js"></script>
</head>
<form method="POST" enctype="multipart/form-data">
<body>
    <center style="margin-top: 30px;" id="chooseFile">
    <!-- Choose file to upload -->
        <input type="file" value="Select File" name="audioFile" multiple="multiple"/>
        <input type="submit" value="Upload File" name="save_audio"/>
    </center>
    <!-- table list containing values in the db -->
    <?php 
        include 'tableList.php';
        include 'select.php';
        echo '</br>';
        tableList();
    ?>
</body>
</form>
</html>