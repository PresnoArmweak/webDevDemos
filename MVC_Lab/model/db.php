<?php
function getPDO(){

    $dsn = "mysql:host=localhost;dbname=coffee_shop;charset=utf8mb4";
    $user = "root";
    $pass = "";

    try {
        $pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        return $pdo;
    } catch (PDOException $e) {
        echo('Error: ' . $e->getMessage());
    }



}

