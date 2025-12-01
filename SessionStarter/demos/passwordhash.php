<?php
$password = "Cat";
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
echo $hashedPassword;

if (password_verify($password, $hashedPassword)) {
    echo ("yes");
} else {
    echo("no");
}