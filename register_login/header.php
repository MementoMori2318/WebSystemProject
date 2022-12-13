<?php
    session_start();
?>

<!DOCTYPE html>

<head>
    
    <link rel="stylesheet" href="css/headerr.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <title>Library Information System</title>
</head>
<body>
    <nav>
        <div class="wrapper">
        <a href="index.php"><img src="./logos/logo.png" alt="Logo"></a>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="book.php">Books</a>
                    <ul>
                        <li><a href="nonfiction.php">Nonfiction</a></li>
                        <li><a href="fiction.php">Fiction</a></li>
                    </ul>
                </li>
                <?php
                    if(isset($_SESSION["useruid"])) {
                        //echo "<li><a href = 'profile.php'>Pofile page</a></li>";
                        echo "<li><a href = 'includes/logout.inc.php'>Log out</a></li>";
                    }
                    else {
                        //echo "<li><a href = 'register.php'>Register</a></li>";
                        echo "<li><a href = 'login.php'>Login</a></li>";
                        
                    }
                ?>
            </ul> 
        </div>
    </nav>
</body>
</html>