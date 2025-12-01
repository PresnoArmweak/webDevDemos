<?php
// Bretts assignment I plagiarized
if ($_GET) {

    $name    = $_GET['customer'];
    $tickets = (int)($_GET['tickets']);
    $coupon  = isset($_GET['coupon']);
    $snack   = $_GET['snack'];

    $price = 12.00;
    $couponDiscount = 2.00;

    $subtotal = $tickets * $price;
    $discount = $coupon ? ($tickets * $couponDiscount) : 0.00;
    $total    = $subtotal - $discount;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-4">

        <h1>Movie Tickets</h1>

        <form method="get" action="">

            <div class="mb-3">
                <label for="customer" class="form-label">Customer Name</label>
                <input type="text" class="form-control" id="customer" name="customer" required>
            </div>

            <div class="mb-3">
                <label for="tickets" class="form-label">Number of Tickets</label>
                <input type="number" class="form-control" id="tickets" name="tickets" min="0" required>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="coupon" name="coupon">
                <label class="form-check-label" for="coupon">Apply Coupon ($2 off per ticket)</label>
            </div>

            <div class="mb-3">
                <label for="snack" class="form-label">Snack Choice</label>

                <select class="form-select" id="snack" name="snack">
                    <option value="No Snack Selected" selected>No Snack</option>
                    <option value="Popcorn">Popcorn</option>
                    <option value="Nachos">Nachos</option>
                    <option value="Candy">Candy</option>
                    <option value="Soda">Soda</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

            <?php if ($_GET): ?>
                <div class="card mt-4 mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Results</h5>
                        <p>Customer name: <?= $name ?></p>
                        <p>Number of tickets: <?= $tickets ?></p>
                        <p>Ticket price: $<?= number_format($price, 2) ?></p>
                        <p>Subtotal: $<?= number_format($subtotal, 2) ?></p>
                        <p>Discount: $<?= number_format($discount, 2) ?></p>
                        <p>Final total: $<?= number_format($total, 2) ?></p>
                        <p>Snack choice: <?= $snack ?></p>
                    </div>
                </div>
            <?php endif; ?>

        </form>
    </div>

</body>

</html>