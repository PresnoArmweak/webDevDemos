<?php

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $tmpName = $_FILES['datafile'];
        print_r($tmpName);
        $path = __DIR__ . DIRECTORY_SEPARATOR . "storage";

        if (!is_dir($path)){
            mkdir($path, 0775, true);
        }

        $fileName = $path . DIRECTORY_SEPARATOR . $tmpName['name'];
        // print_r($fileName);

        print_r($tmpName['tmp_name']);

        $success = move_uploaded_file($tmpName['tmp_name'], $fileName);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>