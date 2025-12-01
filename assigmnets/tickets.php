<?php
    define('TICKET_PRICE', 12.50);
    define('THEATER_NAME', 'OTC Cinema');
    $customer = "Preston";
    $tickets = "3";
    $hasCoupon = true;
    $snack = null;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        <?php
            echo(THEATER_NAME);
        ?>

    </h1>
    <p>
        <?php
            echo("Wellcome" . " " . $customer . ".<br>");
            echo("You purchased $tickets tickets.<br>");
            echo(gettype($tickets) . "<br>");
            $tickets = (int)$tickets;
            echo(gettype($tickets) . "<br>");
            $subtotal = TICKET_PRICE * $tickets;
            if($hasCoupon == true)
            {
                $discount = 2 * $tickets;
                echo("Coupon applied<br>");
            }
            else
            {
                echo("No coupon applied.<br>");
            }
            $finalTotal = $subtotal - $discount;
            echo("Subtotal: $subtotal <br>");
            echo("Discount: $discount <br>");
            echo("Final Total: $finalTotal <br>");
            if (is_null($snack))
                {
                    echo("No snack selected<br>");
                }
            else
                {
                    echo("Snack selected<br>");
                }
        ?>
    </p>
    
</body>
</html>