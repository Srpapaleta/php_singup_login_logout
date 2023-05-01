<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $sb_name = "signupforms";
    $conn = "";

    try{
        $conn = mysqli_connect($db_server, $db_user, $db_pass, $sb_name);
    }
    catch(mysqli_sql_exception){
        echo"Could not connect! <br>";
    }
?>