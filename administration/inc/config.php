<?php 

    //Connect to DB
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");
    define("DB_NAME", "maxim_portfolio");

    $db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

     if($db === false){
         die("ERROR: Could not connect. ". mysqli_connect_error());
    }
?>