<?php 
session_start();
    require "../private/autoload.php";

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $user_name = $_POST['user_name'];
        $passwort = $_POST['passwort'];

        if(!empty($user_name) && !empty($passwort) && !is_numeric($user_name)){
            //save to database
            $user_id = random_num(20);
            $query = "insert into users (user_id, user_name, passwort) values ('$user_id', '$user_name', '$passwort')";
        
            mysqli_query($con, $query);

            header("Location: login.php");
            die;

        }else {
            echo "Please enter valid information!";
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Signup</title>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>

        <div id="box">
            <form method="post">
                <div id="h">Signup</div>

                <input id="text" type="text" name="user_name" required><br><br>
                <input id="text" type="password" name="passwort" required><br><br>

                <input id="btn" type="submit" value="Signup"><br><br>

                <a id="btn2" href="login.php">Click to Login</a><br><br>
            </form>
        </div>

    </body>
</html>