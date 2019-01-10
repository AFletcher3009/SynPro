<?php
    // DB connetion
    $conn=mysqli_connect('localhost', 'root', '', 'audiodb');
    $result = mysqli_query($conn,"SELECT * FROM audio");
    $row = mysqli_fetch_array($result);
    //deletes media file from DB
     if(isset($_POST['deleteMedia'])) {
        $value = $row['filename'];
        deleteMedia($value);
     }
     //Connects to DB > executes delete query
     function deleteMedia($Filename){
        $conn=mysqli_connect('localhost', 'root', '', 'audiodb');
        if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        
        $query="DELETE FROM audio WHERE filename = '{$Filename}'";
        mysqli_query($conn,$query);

        if(mysqli_affected_rows($conn)>0){
            echo "File has been deleted from database.";
            echo "<br/>";
        } else {
            echo "Unable to delete file.";
            echo "<br/>";
        }
        mysqli_close($conn);
    }    
?>