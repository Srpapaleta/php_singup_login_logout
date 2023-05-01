<?php
    include("connect.php");
    session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup Page</title>
  </head>
  <body>
    <div class="container-signup">
        <h1>Sign up Page</h1>
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <div class="container-username">
            <label for="inputename">Name</label>
            <input type="text" class="username" placeholder="Enter your name" name="username">
        </div>
        <div class="container-password">
            <label for="inputename">Password</label>
            <input type="password" class="password" placeholder="Enter your password" name="password">
        </div>
        <input type="submit" name="submit" value="Register">
        </form>
    </div>
  </body>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);

        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

        if(empty($username)){
            echo"You must to introduce a username";
        }else if(empty($password)){
            echo"You must to introduce a password";
        }else{
            $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO registration (username, password) VALUES ('$username','$hash' )";
            try{
                mysqli_query($conn, $sql);
                echo"You are registered";
            }
            catch(mysqli_sql_exception){
                echo"Username is taken";
            }
            
        }
    }
    mysqli_close($conn);
?>
</html>