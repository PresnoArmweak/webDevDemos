<?php
// data/book_functions.php
require_once __DIR__ . '/db.php';

/**
 * REVIEW: Return all genres using PDO->query() (no variables, immediate execute).
 * Later we can replace with a prepared SELECT, but this is fine for a static read.
 *
 * @return array [ ['id'=>1, 'name'=>'Motivation'], ... ]
 */
function genres_all_query(): array
{
    $pdo = get_pdo();
    return $pdo->query("SELECT id, name FROM genres ORDER BY name")->fetchAll();
}


/**
 * Fetches all books from the database with their associated genre names.
 *
 * This function will eventually use a prepared statement and a JOIN between
 * the `books` and `genres` tables to return a list of books. Each book record
 * should include its title, author, price, and the genre name.
 *
 * @return array An array of associative arrays, where each element represents a book.
 */

function books_all(): array
{
    $pdo = get_pdo();  
$stmt = $pdo->prepare("
    SELECT b.*, g.name
    FROM books b
    JOIN genres g ON b.genre_id = g.id
    -- WHERE g.id = :gid
    ORDER BY b.id DESC
  ");
 
  $stmt->execute([
    // ":gid" => 2
  ]);

    return $stmt->fetchAll();
}



/**
 * Inserts a new book into the database using a prepared statement.
 *
 * @param string $title     The book title
 * @param string $author    The book author
 * @param float  $price     The book price
 * @param int    $genre_id  The ID of the genre the book belongs to
 *
 */
function book_create(string $title, string $author, float $price, int $genre_id): void {

    $pdo = get_pdo();
  $stmt = $pdo->prepare("
    INSERT INTO books (title, author, price, genre_id)
    VALUES (:title, :author, :price, :genre_id)
  ");
  $stmt->execute([
    ':title'    => $title,
    ':author'   => $author,
    ':price'    => $price,
    ':genre_id' => $genre_id
  ]);
//   echo ("create: <code>$stmt</code>");
}
