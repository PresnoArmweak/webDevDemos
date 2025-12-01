<?php

    //

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
          <h1 class="display-5 fw-bold text-white">Welcome!</h1>
          <div class="col-lg-6 mx-auto">
            <p class="fs-5 mb-4">
              Please sign up below.
            </p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <a href="signup.php">
                    <button
                        type="button"
                        class="btn btn-outline-info btn-lg px-4 me-sm-3 fw-bold"
                    >
                    Sign Up
                    </button>
                </a>
              
                <a href="welcome.php?member=false">
                    <button type="button" class="btn btn-outline-light btn-lg px-4">
                    Vip Area
              </button>
                </a>
            </div>
          </div>
        </div>
      </div>
    
</body>
</html>