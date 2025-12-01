<?php
    require __DIR__ . DIRECTORY_SEPARATOR . "db.php";
    require __DIR__ . DIRECTORY_SEPARATOR . "functions.php";




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="asssets/style.css">
</head>
<body>
    <table> 
        <tr>
            <th>Products</th>
        </tr>
        <tr>
            <th>Name</th>
            <th class="rightAlign">Price</th>
        </tr>
    
    <?php
        $stmt = returnAllFromProducts();
        $products = $db->query($stmt);
        foreach($products as $product => $row){
            echo("<tr>");
                echo("<td>");
                    echo($row["name"]);
                echo("</td>");

                echo("<td class=rightAlign>");
                    echo($row["price"]);
                echo("</td>");
            echo("</tr>");
        }
    ?>

    </table>

    <br>
    
    <table>
        <tr>
            <th>Order Summary</th>
        </tr>
        <tr>
            <th>Customer</th>
            <th class="rightAlign">Orders</th>
            <th class="rightAlign">Total Spent</th>
        </tr>
    <?php
        $stmt = returnCustomerOrderInfo();
        $customers = $db->query($stmt);
        foreach($customers as $customer => $row){
            echo("<tr>");
                echo("<td>");
                    echo($row["first_name"] . " " . $row["last_name"]);
                echo("</td>");

                echo("<td class=rightAlign>");
                    echo($row["order_count"]);
                echo("</td>");

                echo("<td class=rightAlign>");
                    echo($row["total_spent"]);
                echo("</td>");
            echo("</tr>");
        }
    ?>

    </table>
    <?php require __DIR__ . DIRECTORY_SEPARATOR . "components" . DIRECTORY_SEPARATOR . "footer.php" ?>
</body>
</html>