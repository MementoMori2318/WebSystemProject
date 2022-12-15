<?php
ob_start();
function setComments($conn){
    if(isset($_POST['commentSubmit'])) {
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        $sql = "INSERT INTO comments(uid, date, message) VALUES ('$uid', '$date', '$message')";
        $result = $conn->query($sql);      
    }
}
function getComments($conn){
    $sql ="SELECT * FROM comments";
    $result = $conn->query($sql);
    while ( $row = $result->fetch_assoc()) {
        $id = $row['uid'];
        $sql2 ="SELECT * FROM ita212exercise WHERE usersID='$id'";
        $result2 = $conn->query($sql2);
        if ($row2 = $result2->fetch_assoc()) {
                echo"<div class=comment-box>";
                    echo"<div class=comment-user>";
                        echo"by:". $row2['usersUid'];
                    echo"</div>";
                    echo"<div class=comment-date>";
                        echo$row['date'];
                    echo"</div>";
                    echo"<p>";
                    echo nl2br($row['message']);
                    echo"</p>";
                    if (isset($_SESSION['userid'])) {
                    if ($_SESSION['userid'] == $row2['usersID']) {
                        echo"<form class='delete-btn' action='".deleteComments($conn)."' method='POST'>
                            <input type='hidden' name='cid' value='". $row['cid']."'>
                            <button type='submit' name='commentDelete'>Delete</button>
                        </form>
                        <form class='edit-btn' action='./editcomment.php' method='POST'>
                            <input type='hidden' name='cid' value='". $row['cid']."'>
                            <input type='hidden' name='uid' value='". $row['uid']."'>
                            <input type='hidden' name='date' value='". $row['date']."'>
                            <input type='hidden' name='message' value='". $row['message']."'>
                            <button>Edit</button>
                        </form>";
                    }
                }  
                echo"</div>";
            }
    }    
}
function editComments($conn){
    if (isset($_POST['commentSubmit'])) {
        $cid = $_POST['cid'];
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        $sql = "UPDATE comments SET message='$message' WHERE cid='$cid'";
        $result = $conn->query($sql);
        header("Location: ./book.php");
    }
}
function deleteComments($conn){
    if (isset($_POST['commentDelete'])){
        $cid = $_POST['cid'];
        $sql = "DELETE FROM comments WHERE `comments`.`cid` = $cid";
        // $sql = "DELETE FROM comments WHERE cid='$cid'";
        $result = $conn->query($sql);
        header("location: book.php");
    }  
}