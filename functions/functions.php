<?php

    $Books = [
        'The Great Gatsby' => [
            'author' => 'F. Scott Fitzgerald',
            'year' => 1925,
            'genre' => 'Novel',
            'stock' => 3
        ],
        'To Kill a Mockingbird' => [
            'author' => 'Harper Lee',
            'year' => 1960,
            'genre' => 'Novel',
            'stock' => 5
        ],
        'The Road' => [
            'author' => 'Cormac McCarthy',
            'year' => 2006,
            'genre' => 'Post-apocalyptic',
            'stock' => 0
        ],
    ];

    function checkStock($bookTitle){
        global $Books;
        if (isset($Books[$bookTitle])) {
            return $Books[$bookTitle]['stock'] > 0 ? 'In Stock' : 'Out of Stock';
        } else {
            return 'Book not found';
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <link rel="stylesheet" href="library.css">
</head>
<body>
    <h1>OTC Library</h1>
    <h2>Book List</h2>
    <table>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Year</th>
            <th>Genre</th>
            <th>Stock Status</th>
        </tr>
        <?php foreach ($Books as $title => $details): ?>
        <tr>
            <td><?php echo $title; ?></td>
            <td><?php echo $details['author']; ?></td>
            <td><?php echo $details['year']; ?></td>
            <td><?php echo $details['genre']; ?></td>
            <td>
                <?php $status = checkStock($title);
                    $cls = ($status === 'In Stock') ? 'in' : (($status === 'Out of Stock') ? 'out' : 'unknown');
                ?>
                <span class="stock <?php echo $cls; ?>"><?php echo $status; ?></span>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>