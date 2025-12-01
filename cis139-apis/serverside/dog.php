<?php

$ch = curl_init();           // 1. create a curl handle

curl_setopt($ch, CURLOPT_URL, "https://dog.ceo/api/breeds/image/random");  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  // 2. return result instead of printing

$response = curl_exec($ch);  // 3. run the request

$ch = null;                  // 4. close the curl handle

$data = json_decode($response, true);
print_r($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <img src="<?= $data['message'] ?>" alt="">
</body>
</html>
