<?php
    if(isset($_POST['save_audio']))
    {
        $dir='uploads/';
        $audio_path=$dir.basename($_FILES['audioFile']['name']);
        if(move_uploaded_file($_FILES['audioFile']['tmp_name'],$audio_path))
        {
            echo 'Uploaded Success';
            echo "<br/>";
            saveAudio($audio_path);
        }
    }

    function displayAudio(){
        $conn=mysqli_connect('localhost', 'root', '', 'audiodb');
        if(!$conn){
            die('Server not connected');
        }
        $query="select * from audio";

        $r=mysqli_query($conn,$query);

        while($row=mysqli_fetch_array($r)){
            echo '<a href="play.php?name='.$row['filename'].'">'.$row['filename'].'</a>';
            echo "<br/>";
        }
        mysqli_close($conn);
    }

    function saveAudio($FileName){
        $conn=mysqli_connect('localhost', 'root', '', 'audiodb');
        if(!$conn){
            die('Server not connected');
        }
        $query="Insert into audio(filename, url)values('{$FileName}', 'blank')";

        mysqli_query($conn,$query);

        if(mysqli_affected_rows($conn)>0){
            echo "Audio file path saved in database.";
            echo "<br/>";
        } else {
            echo "Save unsuccessfull";
            echo "<br/>";
        }

        mysqli_close($conn);
    }
?>