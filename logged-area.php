<?php
    session_start();
    if(!isset($_SESSION['logged']) || !$_SESSION['logged']){
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>main page</title>
</head>
<body>
    <h1>Welcome</h1>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <input type="submit" value="Logout">
    </form>
</body>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        unset($_SESSION['logged']);
        header("Location: login.php");
    }
?>
</html>