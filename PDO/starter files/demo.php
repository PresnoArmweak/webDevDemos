<?php

    $DB_HOST = 'localhost';
    $DB_NAME = 'introtodb';
    $DB_USER = 'root';
    $DB_PASS = '';
    
    // Data Source Name aka dsn

    $dsn = "mysql:host=$DB_HOST; dbname=$DB_NAME";

    try{
        $pdo = new PDO($dsn, $DB_USER, $DB_PASS);
        echo("Connetcted");

    } catch(PDOException $e){
        echo ($e->getMessage());
    }