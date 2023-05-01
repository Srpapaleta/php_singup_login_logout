<?php
    include("connect.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<div class="container-login">
        <h1>Login Page</h1>
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <div class="container-username-login">
            <label for="inputename">Username</label>
            <input type="text" class="username-login" placeholder="Enter your username" name="username-login">
        </div>
        <div class="container-password-login">
            <label for="inputename">Password</label>
            <input type="password" class="password-login" placeholder="Enter your password" name="password-login">
        </div>
        <input type="submit" name="submit-login" value="Login">
        </form>
    </div>
</body>
</html>
<?php

    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $usernameLogin = filter_input(INPUT_POST,"username-login", FILTER_SANITIZE_SPECIAL_CHARS);

        $passwordLogin = filter_input(INPUT_POST,"password-login", FILTER_SANITIZE_SPECIAL_CHARS);
        
        $sql = "select * from registration where username='$usernameLogin'";

        $result = mysqli_query($conn, $sql);

        $fila = mysqli_fetch_assoc($result);
        $passwordhash = "";

        if(empty($usernameLogin)){
            echo"You must introduce a username <br>";
        }
        
        if(empty($passwordLogin)){
            echo"You must introduce a password <br>";
        }else{
            $passwordhash = $fila['password'];
        }
        
        if(password_verify($passwordLogin, $passwordhash)){
            $_SESSION['logged'] = true;
            header("Location: logged-area.php");
        }else{
            $_SESSION['logged'] = false;
        }
    }

    mysqli_close($conn);
?>