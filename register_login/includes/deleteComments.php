<?php
    $serverName = "localhost";
    $dBUserName = "root";
    $dBPassword = "";
    $dBName = "ita212";
    
    $conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);
    
    if (!$conn){
        die("Connection failed". mysqli_connect_error());
    }
    

    if (isset($_POST['commentDelete'])){
        $cid = $_POST['cid'];
        //$sql = "DELETE FROM comments WHERE `comments`.`cid` = $cid";
        $sql = "DELETE FROM comments WHERE cid='$cid'";
        $result = $conn->query($sql);
        echo "TEST";
        header("Location: ../book.php");
    }  
