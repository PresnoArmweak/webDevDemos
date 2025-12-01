<?php 
    require __DIR__ . '/includes/functions.php';
    $dataFile = __DIR__ . '/data/games.csv';
    $rows = read_csv_rows($dataFile);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>CSV Data</h1>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Console</th>
                <th>Price</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <td><?php echo esc_html($row[0]); ?></td>
                    <td><?php echo esc_html($row[1]); ?></td>
                    <td><?php echo esc_html($row[2]); ?></td>
                    <td><?php echo '<img src="' . esc_html($row[3]) . '" alt="' . esc_html($row[0]) . ' image">'; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
