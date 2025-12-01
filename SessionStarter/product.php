<?php
// product.php
session_start();

    if (!isset($_SESSION['userid'])) {
        header('Location: create-account.php');
        exit;
    }

    $username = $_SESSION['username'] ?? 'friend';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Welcome <?=$username?></h1>
    <h2>Your customerID = <?= $_SESSION['userid']?></h2>
    <p>When you make an order, this id will be used as the foreign key to the orders table</p>

    <a href="logout.php">Logout</a>
</body>

</html>