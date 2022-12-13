<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
<?php

function setComments($conn){
    if (isset($_POST['commentSubmit'])) {
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
        echo "<div class=comment-box><p>";
        echo $row['uid']."<br>";
        echo $row['date']."<br>";
        echo nl2br($row['message']);
        echo "</p>
            <form class='edit-btn' action='./editcomment.php' method='POST'>
            <input type='hidden' name='cid' value='". $row['cid']."'>
            <input type='hidden' name='uid' value='". $row['uid']."'>
            <input type='hidden' name='date' value='". $row['date']."'>
            <input type='hidden' name='message' value='". $row['message']."'>
            <button>Edit</button>
            </form>
        </div>";
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
        header("Location:book.php");
    }
}