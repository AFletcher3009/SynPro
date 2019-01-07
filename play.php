<!DOCTYPE html>
<html>
<head>
    
</head>
<body>
    <audio controls>
        <!-- Plays music thorugh the browser -->
        <source src="<?php echo $_GET['name']; ?>" type="audio/mpeg">
        <!-- Plays audio file through the windows media player -->
        <!-- <source src="<?php //exec('c:\windows\system32\cmd.exe /c START C:\xampp\htdocs\SP\uploads\audiocheck.net_whitenoise.wav'); ?>"> -->
    </audio>
    <video controls  width='500' height='300'>
        <source src='<?php echo $_GET['name']; ?>' type='video/mp4'>
    </video>
<a href="index.php">HOME</a>
</body>
</html>