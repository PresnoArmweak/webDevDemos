<?php

    session_start(); // must exist before ANY output to the browser
    include "db.php";
    if ($_POST) {
        $username = trim(filter_input(INPUT_POST, 'username'));
        $password = trim(filter_input(INPUT_POST, 'password'));
        
        // hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "Insert into users (username, password_hash) values (:uname, :hashedPassword)";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ":uname" => $username,
            ":hashedPassword" => $hashedPassword

        ]);
        $_SESSION['username'] = $username;
        $_SESSION['userid'] = $db->lastInsertId();
        // print_r($_SESSION);
        header('Location:product.php');
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
    <h1>Create your Account</h1>

    <form method="post">
        <input type="text" name="username" placeholder="username">
        <br>
        <input type="text" placeholder="password" name="password"><br>
        <button type="submit">Create Account</button>
    

    </form>
</body>
</html>