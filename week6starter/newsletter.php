<?php
    $user = '';
    $email = '';
    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $user = $_POST['user'] ?? '';
        $email = $_POST['email'] ?? '';

        if (trim($user) === ''){
            $errors['user'] = "Username is required";
        }
        if(trim($email) === ''){
            $errors['email'] = "Email is required";
        }

        if (empty($errors)){

            // example of PRG - POST -> REDIRECT -> GET
            $qs = 'ok=1&user=' . urlencode($user) . '&email=' . urlencode($email);
            header('Location: newsletter.php?' .$qs);
            exit;
        }
    }

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Newsletter</title>
    <?php require __DIR__ . '/includes/bootstrapcdnlinks.php'; ?>
</head>

<body class="p-3">
    <?php require __DIR__ . '/includes/navigation.php'; ?>
    <div class="container">
        <h1>Newsletter</h1>

        <?php if (isset($_GET['ok']) && $_GET['ok']==='1'): ?>
            <div class="alert alert-success">
                Thanks <?= $_GET['user'] ?>. Subscribed as. <?= $_GET['email'] ?>
            </div>

        <?php endif ?>

        <?php if (($errors)): ?>
            <div class="alert alert-danger"> 
                    please fix:
                    <ul>
                        <?php foreach ($errors as $msg): ?>
                            <li><?= $msg; ?></li>
                        <?php endforeach; ?>
                    </ul>
            </div>

        <?php endif; ?>
 
        <?php if($_SERVER['REQUEST_METHOD'] !== 'POST' || $errors): ?>

        <form action="newsletter.php" method="post" class="mb-3">
            <label class="form-label">Username
                <input class="form-control" type="text" name="user" value=<?=$user?> >
            </label>
            <label class="form-label mt-2">Email
                <input class="form-control" type="text" name="email">
            </label>
            <button class="btn btn-primary mt-3" type="submit">Subscribe</button>
        </form>

        <?php else: ?>
            <h2>Raw POST</h2>
            <pre><?php var_dump($_POST);?></pre>
        <?php endif; ?>
        
    </div>
</body>

</html>