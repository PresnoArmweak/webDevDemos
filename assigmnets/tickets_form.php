<?php
    $discount = 0;
    $tickets = 0;
    if ($_GET){
        $Customer_name = $_GET['Customer_name'];
        $tickets = (int) $_GET['tickets'];
        $Snack = $_GET['Snack'];
    
        if (isset($_GET['Coupon'])){
            // echo "Coupon selected";
            $discount = $tickets * 2.00;
            $hasCoupon = true;
        } else {
            // echo "No coupon selected";
            $hasCoupon = false;
        }
        $Subtotal = $tickets * 12.00;
        $Final_total = number_format($Subtotal - $discount, 2);
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets Form</title>
    <style>
        body {
            background: #181a1b;
            color: #f1f1f1;
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }
        .container {
            max-width: 400px;
            margin: 40px auto;
            background: #23272b;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.7);
            padding: 32px 28px 24px 28px;
        }
        h2 {
            color: #ffb347;
            margin-top: 32px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            color: #ffb347;
            font-weight: 500;
        }
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px 10px;
            margin-bottom: 18px;
            border: none;
            border-radius: 6px;
            background: #2c3136;
            color: #f1f1f1;
            font-size: 1em;
        }
        input[type="checkbox"] {
            accent-color: #ffb347;
            margin-right: 8px;
        }
        input[type="submit"] {
            background: linear-gradient(90deg, #ffb347 0%, #ffcc80 100%);
            color: #23272b;
            border: none;
            border-radius: 6px;
            padding: 10px 0;
            width: 100%;
            font-size: 1.1em;
            font-weight: bold;
        }
        input[type="submit"]:hover {
            background: linear-gradient(90deg, #ffcc80 0%, #ffb347 100%);
        }
        ul {
            background: #23272b;
            border-radius: 8px;
            padding: 18px 22px;
            margin-top: 24px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.3);
        }
        li {
            margin-bottom: 10px;
            font-size: 1.05em;
        }
        strong {
            color: #ffb347;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="tickets_form.php" method="get">
            <label for="Customer_name">Customer name:</label>
            <input type="text" id="Customer_name" name="Customer_name" required>
            <label for="tickets">Number of tickets:</label>
            <input type="number" id="tickets" name="tickets" required>
            <label for="Coupon"><input type="checkbox" id="Coupon" name="Coupon">Do you have a Coupon?</label>
            <label for="Snack">Select a snack:</label>
            <select id="Snack" name="Snack">
                <option value="">--Select--</option>
                <option value="Popcorn">Popcorn</option>
                <option value="Nachos">Nachos</option>
                <option value="Hotdog">Hotdog</option>
                <option value="Candy">Candy</option>
            </select>
            <input type="submit" value="Submit">
        </form>

        <?php if ($_GET): ?>
        <h2>Order Summary</h2>
        <ul>
            <li><strong>Customer name:</strong> <?php echo $Customer_name; ?></li>
            <li><strong>Number of tickets:</strong> <?php echo (int)$tickets; ?></li>
            <li><strong>Subtotal:</strong> $<?php echo $Subtotal; ?></li>
            <li><strong>Discount:</strong> <?php echo $hasCoupon ? ('$' . $discount) : 'No discount'; ?></li>
            <li><strong>Final total:</strong> $<?php echo $Final_total; ?></li>
            <li><strong>Snack choice:</strong> <?php echo $Snack ? : 'No snack selected'; ?></li>
        </ul>
        <?php endif; ?>
    </div>
</body>
</html>
