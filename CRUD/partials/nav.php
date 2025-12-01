<?php // partials/nav.php 
?>
<nav class="navbar navbar-expand-md mk-navbar rounded mb-3" role="navigation">
    <div class="container-fluid">
        <a class="navbar-brand text-white fw-semibold" href="?view=list">Library Nook</a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mkNav" aria-controls="mkNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>

        <div class="collapse navbar-collapse" id="mkNav">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item"><a class="nav-link text-white" href="?view=list">Books</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="?view=create">Add Book</a></li>
            </ul>
        </div>
    </div>
</nav>