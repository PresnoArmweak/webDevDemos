<?php
    // print_r($_GET);
    $message = "Form not submitted yet";
    $result = null;

    if ($_GET){
        $message = $_GET['val1'] . " - " . $_GET['val2'];
        $result = $_GET['val1'] + $_GET['val2'];
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

    <h1>Here is my Form</h1>
    <?php
        $result ? $message = $result : $message = "nope";
    ?>
    <?= $message ?>
    <form method="get">
        <input type="text" name="val1" id="">
        <input type="text" name="val2" id="">
        <input type="submit" value="Submit">
    </form>
    
</body>
</html>