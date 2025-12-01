<?php 
    $csvPath = __DIR__ . "/data/stock.csv";
    require __DIR__ . "/read.php";
    $aryStocks = getCSV()


?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        foreach($aryStocks as $stocks){
            $path = "images/$stocks[3]";
            echo("<P>$stocks[0] $stocks[1] <img src='$path' alt='$stocks[1]'></p>");
        }
    ?>
</body>
</html>