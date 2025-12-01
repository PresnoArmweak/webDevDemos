<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');  // Allows all domains. Replace '*' with a specific domain if needed.


include "database.php";


$params = [];
$sql = "SELECT * FROM records";

// check for a query string
if (isset($_GET['id'])) {
    // Sanitize the 'id' to prevent SQL Injection
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $sql .= " WHERE id = :id";
    $params[":id" ] = $id;
}

$stmt = $db->prepare($sql);
$stmt->execute($params);

//print_r($stmt->fetchAll());

echo json_encode($stmt->fetchAll());
