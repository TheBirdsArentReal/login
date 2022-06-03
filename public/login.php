<?php 

session_start();
    require "../private/autoload.php";

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_SESSION['token']) && isset($_POST['token']) && $_SESSION['token'] == $_POST['token']){

        $user_name = $_POST['user_name'];
        $passwort = $_POST['passwort'];

        if(!empty($user_name) && !empty($passwort) && !is_numeric($user_name)){
            //read from database
            $query = "select * from users where user_name = '$user_name' limit 1";
        
            $result = mysqli_query($con, $query);

            if($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['passwort'] === $passwort) {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die;
                }
            }
        }
        echo "Wrong username or password!";
    }
    $_SESSION['token'] = random_num(60);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>

        <div id="box">
            <form method="post">
                <div id="h">Login</div>

                <input id="text" type="text" name="user_name" required><br><br>
                <input id="text" type="password" name="passwort" required><br><br>
                <input type="hidden" name="token" value="<?=$_SESSION['token']?>">

                <input id="btn" type="submit" value="Login"><br><br>

                <a id="btn2" href="signup.php">Click to Signup</a><br><br>
            </form>
        </div>

    </body>
</html>