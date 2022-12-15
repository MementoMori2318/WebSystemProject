<?php
function deleteComments($conn){
    if (isset($_POST['commentDelete'])){
        $cid = $_POST['cid'];
        $sql = "DELETE FROM comments WHERE `comments`.`cid` = $cid";
        // $sql = "DELETE FROM comments WHERE cid='$cid'";
        $result = $conn->query($sql);
        header("location: ../book.php");
    }  
}