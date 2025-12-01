<!-- made by Preston Armstrong -->

<?php
    include_once 'functions.php';
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
            <th>Return Date</th>
            <th>Due Date</th>
            <th>Due Status</th>
        </tr>
        <?php foreach ($Books as $title => $details): ?>
        <tr>
            <td><?php echo $title; ?></td>
            <td><?php echo $details['author']; ?></td>
            <td><?php echo $details['year']; ?></td>
            <td><?php echo $details['genre']; ?></td>
            <td>
                <?php
                    $status = checkStock($title);
                    $cls = ($status === 'In Stock') ? 'in' : (($status === 'Out of Stock') ? 'out' : 'unknown');
                ?>
                <span class="stock <?php echo $cls; ?>"><?php echo $status; ?></span>
            </td>
            <td><?php echo $details['return_date'] ?? 'N/A'; ?></td>
            <td><?php echo $details['due_date'] ?? 'N/A'; ?></td>
            <td>
                <?php
                    if (!empty($details['return_date']) && !empty($details['due_date'])) {
                        $returnTs = returnReturnDate($details['return_date']);
                        $dueTs = returnDueDate($details['due_date']);
                        $dueStatus = checkDueStatus($returnTs, $dueTs);
                    } else {
                        $dueStatus = 'Unknown';
                    }
                    $dueCls = ($dueStatus === 'On Time') ? 'due-in' : (($dueStatus === 'Overdue') ? 'due-out' : 'due-unknown');
                ?>
                <span class="due-status <?php echo $dueCls; ?>"><?php echo $dueStatus; ?></span>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <!-- Form below the table -->
    <div class="form-wrapper">
        <?php include 'form.php'; ?>
    </div>


</body>
</html>