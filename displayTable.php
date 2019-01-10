<?php 
//Once Upload button is pressed file then moves to the uploads folder.
if(isset($_POST['save_audio'])) {
    $dir='uploads/';
    $audio_path=$dir.basename($_FILES['audioFile']['name']);
    if(move_uploaded_file($_FILES['audioFile']['tmp_name'],$audio_path))
    {
        echo "<br/>";
        echo 'Moved into Upload folder';
        echo "<br/>";
    }
}
//Once delete button is pressed, file moves from uploads folder to the trash folder.
if(isset($_POST['deleteMedia'])) {
    $currentFilePath = 'uploads/'.$_GET['name'];
    $newFilePath = 'trash/'.$_GET['name'];
    //Move the file using PHP's rename function.
    $fileMoved = rename($currentFilePath, $newFilePath);
    if($fileMoved){
        echo "<br/>";
        echo 'Deleted from Upload folder';
        echo "<br/>";
    } else {
        echo "file not deleted";
    }
}
//  Reads the uploads folder to see what files are in the folder.
$dirUploads = dirname(__FILE__) . "/uploads";
$files1 = scandir($dirUploads);
//  Counts files.
$indexCount = count($files1);
//  Sorts the files in alphabetical order.
sort($files1);
//  Prints a table
print("<TABLE border=1 cellpadding=5 cellspacing=0 class=whitelinks>\n");
print("<TR><TH>Filename</TH></TR>\n");
// loop through the array of files and print them all
$v = $_POST['cat'];
$name = $_GET['name'];
for($i=0; $i < $indexCount; $i++) {
        if (substr("$files1[$i]", 0, 1) != "."){ // don't list hidden files
        print('<TR>
                <TD>
                    <a class="'.$v.'" name="'.$name.'" href="filetable.php?name='.$files1[$i].'">'.$files1[$i].'</a>
                </td>');
        print("</TR>\n");
    }
}
print("</TABLE>\n");
?>
