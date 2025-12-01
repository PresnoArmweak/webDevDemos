<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Store CSV</title>
    <link rel="stylesheet" href="css/style.css">
    </head>
<body>
    <main>
        <h1>Upload CSV</h1>
        <p class="muted">Please upload a CSV file with columns: Title, Console, Price, Image URL.</p>

        <form action="upload.php" method="post" enctype="multipart/form-data" aria-describedby="csv-hint">
            <label for="datafile">CSV file</label>
            <input type="file" name="datafile" id="datafile" accept=".csv" required>
            <small id="csv-hint" class="muted">Only .csv files are accepted.</small>
            <button type="submit">Upload</button>
        </form>
    </main>
</body>
</html>