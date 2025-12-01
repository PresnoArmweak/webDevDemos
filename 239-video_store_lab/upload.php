<?php
    require  __DIR__ . '/includes/functions.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $destDir = __DIR__ . '/data';
        $destFile = $destDir . '/games.csv';
        $csvFile = $_FILES['datafile'];
        if (!is_dir($destDir)){
            mkdir($destDir, 0755, true);
        }
        if ($csvFile != null){
            move_uploaded_file($_FILES['datafile']['tmp_name'], $destFile);
            $rows = read_csv_rows($destFile);
            write_csv_rows($destFile, $rows);
            $status = 'success';
            $message = 'File uploaded successfully.';
        } else {
            $status = 'error';
            $message = 'Failed to upload file.';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload CSV</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main>
        <h1>Upload CSV</h1>
        <?php if ($status === 'success'): ?>
            <p>✅ <?php echo esc_html($message); ?> <a class="button" href="view.php">See Data</a></p>
        <?php elseif ($status === 'error'): ?>
            <p>❌ <?php echo esc_html($message); ?></p>
        <?php endif; ?>

        <p class="muted">This page shows the result of your upload. To upload another file, go back to the home page.</p>

        <p class="small"><a class="button" href="index.php">Back to Home</a></p>
    </main>
</body>
</html>