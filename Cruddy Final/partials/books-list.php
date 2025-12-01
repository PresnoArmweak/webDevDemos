<?php
// partials/book-list.php
require_once __DIR__ . '/../data/book_functions.php';
$rows = books_all();
?>

<div class="d-flex align-items-center justify-content-between mb-3">
    <h2 class="h4 m-0">Books</h2>
    <a href="?view=create" class="btn btn-primary">Add Book</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width:60px;">ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Genre</th>
                        <th class="text-end" style="width:100px;">Price</th>
                        <th style="width:150px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($rows) > 0): ?>
                        <?php foreach ($rows as $r): ?>
                            <tr>
                                <td><?= (int)$r['id'] ?></td>
                                <td><?= htmlspecialchars($r['title']) ?></td>
                                <td><?= htmlspecialchars($r['author']) ?></td>
                                <td><?= htmlspecialchars($r['name']) ?></td>
                                <td class="text-end">$<?= number_format((float)$r['price'], 2) ?></td>
                                <td>
                                    <form method="post" class="d-inline">
                                        <input type="hidden" name="id" value="<?= (int)$r['id'] ?>">
                                        <input type="hidden" name="action" value="edit">
                                        <button class="btn btn-sm btn-outline-primary">Edit</button>
                                    </form>
                                    <form method="post" class="d-inline" onsubmit="return confirm('Delete this book?');">
                                        <input type="hidden" name="id" value="<?= (int)$r['id'] ?>">
                                        <input type="hidden" name="action" value="delete">
                                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-muted text-center py-4">
                                No books found in the library.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>