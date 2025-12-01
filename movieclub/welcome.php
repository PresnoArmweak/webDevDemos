<?php
    if ($_GET['member'] === 'false'){
        header('Location: signup.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
        include __DIR__ . "/includes/bootstrapcdnlinks.php";
        include __DIR__ . "/includes/navigation.php";
    ?>
</head>
<body class="bg-dark">

    <div class="bg-dark text-secondary px-4 py-5 text-center">
        <div class="py-5">
          <h1 class="display-5 fw-bold text-white">Welcome, Movie Club member!</h1>
        </div>
      </div>
    
</body>
</html>