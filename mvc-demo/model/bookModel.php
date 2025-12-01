<?php 
    include "db.php";
    function getbooks(){
        

        $pdo = getPDO();

        $stmt = $pdo->prepare("Select * from books");
        $stmt->execute();
        return $stmt->fetchAll();
        
    }


