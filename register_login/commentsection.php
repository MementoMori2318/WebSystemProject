<?php
    date_default_timezone_set('Asia/Manila');
    include 'includes/dbh.inc.php';
    include 'includes/comments.inc.php';
?>
<link rel="stylesheet" type="text/css" href="css/comments.css">
<div class="comment-container">
<?php
if(isset($_SESSION["userid"])) {
    echo "<form method='POST' action='".setComments($conn)."'>
    <input type='hidden' name='uid' value='" .$_SESSION["userid"]."'>
    <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
    <textarea name='message'></textarea><br>
    <button type='submit' name='commentSubmit'>Comment</button>
    </form>";
}else {
    echo "You must be <a href = 'login.php'>logged in</a> to post a review.<a href = 'register.php'>Register</a> an account to get started.";
}
getComments($conn);
?>
</div>