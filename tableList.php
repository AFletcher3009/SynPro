<?php
    //Moves file into the Uploads folder
    if(isset($_POST['save_audio'])) {
        $dir='uploads/';
        $audio_path=$dir.basename($_FILES['audioFile']['name']);

        if(move_uploaded_file($_FILES['audioFile']['tmp_name'],$audio_path))
        {
            echo "<br/>";
            echo 'Moved into Upload folder';
            echo "<br/>";
        }
        saveAudio($audio_path);        
    }
    //connects to the db and shows all of the names in the db in a table that is printed in index.php
    function tableList() {
        $con=mysqli_connect('localhost','root','','audiodb');
        // Check connection
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $result = mysqli_query($con,"SELECT * FROM audio");

        echo "<table border='1'>
                <tr>
                    <th>Audio File</th>
                </tr>";

            while($row = mysqli_fetch_array($result))
            {
            $value = $row['filename'];
            echo "<tr>";
                echo "<td>";
                echo '<a href="index.php?name='.$value.'">'.$value.'</a>';
                echo '<button href="select.php?value='.$value.'" type="submit" name="deleteMedia" value="'.$value.'">delete</button>';
                echo "</td>";
            echo "</tr>";
            }

        echo "</table>";
    }
    //connects to the db and adds the file name to the db
    function saveAudio($FileName){
        $con=mysqli_connect('localhost','root','','audiodb');
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        //TODO if function to save into video or audio table
        $query="Insert into audio(filename)values('{$FileName}')";

        mysqli_query($con,$query);

        if(mysqli_affected_rows($con)>0){
            echo "Audio file path saved in database.";
            echo "<br/>";
        } else {
            echo "Hasn't saved into the Database";
            echo "<br/>";
        }

        mysqli_close($con);
       
    }
?>