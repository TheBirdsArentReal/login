<?php 
session_start();
    $_SESSION;
    require "../private/autoload.php";

    $user_data = checkLogin($con);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Index</title>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>

        <br><br><a id="btn2" href="logout.php">Logout</a>
        <h1>Startseite</h1>

        <br>
        <p id="hallo">Hallo, <?php echo $user_data['user_name']; ?>!</p>
    </body>
</html>