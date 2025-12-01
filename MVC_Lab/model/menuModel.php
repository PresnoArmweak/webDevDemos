<?php 
    include "db.php";
    function getMenu(){
        

        $pdo = getPDO();

        $stmt = $pdo->prepare("Select * from beverages");
        $stmt->execute();
        return $stmt->fetchAll();
        
    }

