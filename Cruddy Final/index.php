<?php
// public/index.php
require_once __DIR__ . '/data/book_functions.php';

$view   = filter_input(INPUT_GET, 'view') ?: 'list';
$action = filter_input(INPUT_POST, 'action');
switch ($action) {
    // ========== CREATE ==========
    case 'create':
        // filter_input() returns the filtered value if it succeeds, and false if it fails the filter or the variable doesn’t exist.
        $title    = trim((string)(filter_input(INPUT_POST, 'title') ?? ''));
        $author   = trim((string)(filter_input(INPUT_POST, 'author') ?? ''));
        $price    = (float)(filter_input(INPUT_POST, 'price') ?? 0);
        $genre_id = (int)(filter_input(INPUT_POST, 'genre_id') ?? 0);

    

        if ($title && $author && $genre_id) {
            book_create($title, $author, $price, $genre_id);
            $view = 'created';
        } else {
            $view = 'create'; // missing fields
        }
        break;


    // ========== PLACEHOLDERS for next class ==========
    case 'delete':
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        if ($id) {
            $deleted = book_delete($id);
        }
        $view = 'deleted';
        break;
        
    case 'edit':
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        if ($id) {
            $book = book_get($id);
        }
        $view = 'create';   // reuse the same form view
        break;

    case 'update':
        $id        = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $title     = (string)filter_input(INPUT_POST, 'title',  FILTER_UNSAFE_RAW);
        $author    = (string)filter_input(INPUT_POST, 'author', FILTER_UNSAFE_RAW);
        $price_in  =        filter_input(INPUT_POST, 'price',   FILTER_UNSAFE_RAW);
        $genre_id  =        filter_input(INPUT_POST, 'genre_id', FILTER_VALIDATE_INT);

        $price = is_numeric($price_in) ? (float)$price_in : null;

        if ($id && $title !== '' && $author !== '' && $price !== null && $genre_id) {
            book_update($id, $title, $author, $price, (int)$genre_id);
        }
        $view = 'updated';
        break;

    
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Library Nook — CRUDDY</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="./assets/styles.css">
</head>

<body class="bg-light">
    <div class="container py-4">
        <?php include __DIR__ . '/partials/nav.php'; ?>

        <?php
        if ($view === 'list')        include __DIR__ . '/partials/books-list.php';
        elseif ($view === 'create')  include __DIR__ . '/partials/book-form.php';
        elseif ($view === 'created') include __DIR__ . '/partials/book-created.php';
        elseif ($view === 'updated') include __DIR__ . '/partials/book-updated.php';
        elseif ($view === 'deleted') include __DIR__ . '/partials/book-deleted.php';
        else                         include __DIR__ . '/partials/books-list.php';
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>