
<h2>Books</h2>

<?php if (empty($books)): ?>
    <p>No books found.</p>
<?php else: ?>
    <ul>
        <?php foreach ($books as $book): ?>
            <li>
                <?= htmlspecialchars($book['title']) ?>
                <?php if (!empty($book['author'])): ?>
                    — <em><?= htmlspecialchars($book['author']) ?></em>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>