<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "exam2";

    $dns = "mysql:host=$servername;dbname=$dbname;";

    try {
    $db = new PDO($dns, $username, $password);
    }
    catch(PDOException $e){
        echo("Error: $e has occured.");
    }