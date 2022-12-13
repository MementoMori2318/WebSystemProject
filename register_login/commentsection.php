<?php
    date_default_timezone_set('Asia/Manila');
    include 'includes/dbh.inc.php';
    include 'includes/comments.inc.php';
?>
<link rel="stylesheet" type="text/css" href="./css/comment.css">
<div class="comment-container">
<?php
echo "<form method='POST' action='".setComments($conn)."'>
    <input type='hidden' name='uid' value='test'>
    <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
    <textarea name='message'></textarea><br>
    <button type='submit' name='commentSubmit'>Comment</button>

</form>";
getComments($conn);
?>
</div>