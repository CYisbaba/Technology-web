<?php
    $server = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "eshop";

    $con = mysqli_connect($server, $db_username, $db_password, $db_name);
    if(!$con){
        die("can't connect".mysqli_connect_error());
    }
    mysqli_query($con, 'set names utf8');
?>