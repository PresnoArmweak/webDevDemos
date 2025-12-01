<?php
// data/book_functions.php
require_once __DIR__ . '/db.php';

/**
 * REVIEW: Return all genres using PDO->query() (
 *
 * @return array [ ['id'=>1, 'name'=>'Motivation'], ... ]
 */
function genres_all_query(): array
{
  $pdo = get_pdo();
  return $pdo->query("SELECT id, name FROM genres ORDER BY name")->fetchAll();
}

/*
🧠 Why prepare() first, then execute()

When we use prepare(), we’re saying:

“Here’s the SQL structure — I’ll give you the ingredients later.”

Then before we call execute(), we can:
	•	Validate user input (make sure it’s the right type)
	•	Filter it (remove tags or symbols)
	•	Sanitize it (escape dangerous characters)
	•	And finally, bind it safely when we execute.
*/
function books_all(): array {
  $pdo = get_pdo();

  // Prepared SELECT with a JOIN — simple and safe
  $stmt = $pdo->prepare("
    SELECT b.*, g.name 
    FROM books b
    JOIN genres g ON b.genre_id = g.id
    ORDER BY b.id DESC
  ");

  $stmt->execute();
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
 * @return void
 */

function book_create(string $title, string $author, float $price, int $genre_id):void
{
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
  //echo ("create: <code>$stmt</code>");

}


// day 2 - DELETE

function book_delete(int $id): int
{
  $pdo = get_pdo();
  $stmt = $pdo->prepare("DELETE FROM books WHERE id = :id");
  $stmt->execute([':id' => $id]);
  return $stmt->rowCount(); // 1 if deleted, 0 if not found
}


// READ single
function book_get(int $id): ?array
{
  $pdo = get_pdo();
  $sql = "
        SELECT b.id, b.title, b.author, b.price, b.genre_id, g.name AS genre_name
        FROM books b
        JOIN genres g ON g.id = b.genre_id
        WHERE b.id = :id
        LIMIT 1
    ";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([':id' => $id]);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  return $row ?: null;
}

// UPDATE
function book_update(int $id, string $title, string $author, float $price, int $genre_id): int
{
  $pdo = get_pdo();
  $sql = "
        UPDATE books
           SET title = :title,
               author = :author,
               price = :price,
               genre_id = :genre_id
         WHERE id = :id
    ";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    ':title'    => $title,
    ':author'   => $author,
    ':price'    => $price,
    ':genre_id' => $genre_id,
    ':id'       => $id
  ]);
  return $stmt->rowCount(); // 1 if changed, 0 if no change/not found
}
