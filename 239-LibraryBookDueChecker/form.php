<!-- made by Preston Armstrong -->

<?php
include_once 'functions.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Form</title>
    <link rel="stylesheet" href="library.css">
</head>
    <body>
        <form method="get" class="book-form">
            <label for="name">Name of your book:</label>
            <input type="text" name="name" id="name" required>


            <label for="author">Name of author:</label>
            <input type="text" name="author" id="author" required>


            <label for="year">Year of publication:</label>
            <input type="number" name="year" id="year" required>


            <label for="genre">Genre:</label>
            <input type="text" name="genre" id="genre" required>


            <label for="stock">Number being returned:</label>
            <input type="number" name="stock" id="stock" required>


            <label for="return_date">What is today's date:</label>
            <input type="date" name="return_date" id="return_date" required>


            <label for="due_date">When will you return the book:</label>
            <input type="date" name="due_date" id="due_date" required>


            <input type="submit" value="Submit">
        </form>
    </body>
</html>