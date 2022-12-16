<?php
    date_default_timezone_set('Asia/Manila');
    include 'includes/dbh.inc.php';
    include 'includes/comments.inc.php';
?>
<link rel="stylesheet" type="text/css" href="css/comment.css">
<div class="comment-container">
<?php
echo "<div class='review'>";
echo "<p>Write a Review</p>";
echo "</div>";
if(isset($_SESSION["userid"])) {
    echo "<form method='POST' action='".setComments($conn)."'>
    <input type='hidden' name='uid' value='" .$_SESSION["userid"]."'>
    <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
    <textarea name='message'></textarea><br>
    <button class='commentbutton' type='submit' name='commentSubmit'>Comment</button>
    </form>";
}else {
    echo "<p class='commentLogin'>You must be <a href = 'login.php'>Logged in</a> to post a review.<a href = 'register.php'>Register</a> an account to get started.</p>";
}
echo "<div class=comment-box-container>";
getComments($conn);
echo "</div>";
?>
</div>