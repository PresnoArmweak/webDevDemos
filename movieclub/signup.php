<?php
session_start();

$Name = '';
$favorite_movie = '';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Name = $_POST['Name'] ?? '';
    $favorite_movie = $_POST['favorite_movie'] ?? '';
    $member = 'true';

    if (trim($Name) === '') {
        $errors['Name'] = "Name is required";
    }
    if (trim($favorite_movie) === '') {
        $errors['favorite_movie'] = "Favorite movie is required";
    }

    // Store the POST data in session so we can show it once after redirect
    $_SESSION['last_post'] = $_POST;
    // Store the time of the session start so it can be closed after 5 minutes
    $_SESSION['start_time'] = time();

    // Only set the show_dump flag if we haven't already shown the dump in this session
    if (empty($_SESSION['dump_shown_once'])) {
        $_SESSION['show_dump'] = true;
        // record that we've shown the dump once in this session
        $_SESSION['dump_shown_once'] = true;
    } else {
        // ensure we don't accidentally show the dump again until you close the browser
        unset($_SESSION['show_dump']);
    }


    if ($_SESSION['start_time'] + 300 < time()) {
        // Session has expired after 5 minutes
        session_unset();
        session_destroy();
    }

    if (empty($errors)) {
        $qs = 'ok=1&Name0=' . urlencode($Name) . '&favorite_movie=' . urlencode($favorite_movie);
        header("Location: signup.php?" . $qs);
        // End the request after successful redirect
        exit;
    }

    // If there are validation errors, do NOT redirect. Let the script continue
    // so the form can re-render with errors shown and sticky values preserved.
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
<body class="bg-dark text-white"> 
    <div class="bg-dark text-secondary px-4 py-5 text-center">
        <div class="py-5">
          <h1 class="display-5 fw-bold text-white">Welcome!</h1>
          <div class="col-lg-6 mx-auto">
            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger text-start" role="alert">
                    <strong>Please fix the following errors:</strong>
                    <ul class="mb-0 mt-2">
                        <?php foreach ($errors as $field => $msg): ?>
                            <li><?php echo htmlspecialchars($msg, ENT_QUOTES); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="signup.php" method="post">
                <div class="mb-3">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" id="Name" name="Name" aria-describedby="NameHelp" 
                        value="<?php echo htmlspecialchars(
                            // Priority: POST (current submission), then GET (after redirect), then previous variable
                            $_POST['Name'] ?? $_GET['Name0'] ?? $Name
                        , ENT_QUOTES);
                        ?>">
                    <div id="Name" class="form-text">Plesae enter your name.</div>
                </div>
                <div class="mb-3">
                    <label for="favorite_movie" class="form-label">Favorite Movie</label>
                    <input type="text" class="form-control" id="favorite_movie" name="favorite_movie" required
                        value="<?php echo htmlspecialchars(
                            $_POST['favorite_movie'] ?? $_GET['favorite_movie'] ?? $favorite_movie
                        , ENT_QUOTES);
                        ?>">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
        <?php 
            // Show success message and (optionally) the POST dump once after redirect
            if (isset($_GET['ok']) && $_GET['ok'] == 1){
                $Name = $_GET['Name0'] ?? '';
                $favorite_movie = $_GET['favorite_movie'] ?? '';
                echo "Thanks $Name, we’ve added your favorite movie $favorite_movie to our club list.";
            }

            // If there's a stored POST in session and the show_dump flag is set, display it once
            if (!empty($_SESSION['show_dump']) && !empty($_SESSION['last_post'])) {
                echo '<pre class="text-start text-white bg-secondary p-2 mt-3">'; // keeps styling with the rest of the page
                var_dump($_SESSION['last_post']);
                echo '</pre>';

                // Clear the session values so the dump only appears once
                unset($_SESSION['last_post'], $_SESSION['show_dump']);
            }
        ?>
      </div>
</body>
</html>