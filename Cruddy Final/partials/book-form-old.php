<?php
// partials/book-form.php


$genres = genres_all_query();

?>
<h2 class="h4 mb-3">Add Book</h2>

<div class="card shadow-sm">
    <div class="card-body">
        <form method="post" class="row g-3">
            <div class="col-12">
                <label class="form-label">Title</label>
                <input name="title" class="form-control" >
            </div>

            <div class="col-md-6">
                <label class="form-label">Author</label>
                <input name="author" class="form-control" >
            </div>

            <div class="col-md-3">
                <label class="form-label">Price</label>
                <input name="price" type="number" step="0.01" class="form-control" >
            </div>

            <div class="col-md-3">
                <label class="form-label">Genre</label>
                <select name="genre_id" class="form-select" >
                    <option value="">Select...</option>
                    <?php foreach ($genres as $g): ?>
                        <option value="<?= (int)$g['id'] ?>"><?= htmlspecialchars($g['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <input type="hidden" name="action" value="create">

            <div class="col-12">
                <button class="btn btn-success">Create</button>
                <a href="?view=list" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>