<?php
// partials/book-form.php

// Detect edit mode and set defaults
$is_edit  = isset($book) && isset($book['id']);
$action   = $is_edit ? 'update' : 'create';

$title    = $is_edit ? htmlspecialchars($book['title'])  : '';
$author   = $is_edit ? htmlspecialchars($book['author']) : '';
$price    = $is_edit ? htmlspecialchars($book['price'])  : '';
$genre_id = $is_edit ? (int)$book['genre_id']            : 0;


$genres = genres_all_query();
?>

<!--  Toggles edit or add  -->
<h2 class="h4 mb-3"><?= $is_edit ? 'Edit Book' : 'Add Book' ?></h2>

<!-- ADD Values to the input boxes  -->
<div class="card shadow-sm">
    <div class="card-body">
        <form method="post" class="row g-3">
            <div class="col-12">
                <label class="form-label">Title</label>
                <input name="title" class="form-control" value="<?= $title ?>">
            </div>

            <div class="col-md-6">
                <label class="form-label">Author</label>
                <input name="author" class="form-control" value="<?= $author ?>">
            </div>

            <div class="col-md-3">
                <label class="form-label">Price</label>
                <input name="price" type="number" step="0.01" class="form-control" value="<?= $price ?>">
            </div>

            <div class="col-md-3">
                <label class="form-label">Genre</label>
                <select name="genre_id" class="form-select">
                    <option value="">Select...</option>
                    <?php foreach ($genres as $g): ?>
                        <?php $gid = (int)$g['id']; ?>
                        <!-- Selected will show the genre of the book -->
                        <option value="<?= $gid ?>" <?= $gid === $genre_id ? 'selected' : '' ?>>
                            <?= htmlspecialchars($g['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- hidden fields -->
            <input type="hidden" name="action" value="<?= $action ?>">
            <?php if ($is_edit): ?>
                <input type="hidden" name="id" value="<?= (int)$book['id'] ?>">
            <?php endif; ?>

            <div class="col-12">
                <button class="btn btn-success"><?= $is_edit ? 'Update' : 'Create' ?></button>
                <a href="?view=list" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>