<?php

    function GET($requestURL)
    {
        $ch = curl_init($requestURL);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response_json = curl_exec($ch);
        curl_close($ch);

        return json_decode($response_json);
    }

    $carts = NULL;

    if (isset($_GET['id'])) {
        $carts = GET('https://fakestoreapi.com/carts/user/' . $_GET['id']);
    } else {
        $carts = GET('https://fakestoreapi.com/carts/user/1');
    }

    if (!isset($carts[0]->userId)) {
        echo "<h1>This user doesn't have a cart!</h1>";
        die();
    }

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Checkout</title>
        <style>
            body { margin: 0 200px; }
            table { font-family: Arial, Helvetica, sans-serif; border-collapse: collapse; width: 100%; }
            td, th { border: 1px solid #ddd; padding: 8px; }
            tr:nth-child(even){background-color: #f2f2f2;}
            tr:hover {background-color: #ddd;}
            th { padding-top: 12px; padding-bottom: 12px; text-align: left; background-color: #04AA6D; color: white; }
        </style>
    </head>
    <body>
        <h1>Checkout</h1>
        <p>User ID: <?php echo $carts[0]->userId ?> </p>

        <table>
            <tr>
                <th>Product Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>SUBTOTAL</th>
            </tr>
            <?php
                foreach ($carts as $i => $cart) {
                    // echo "<p>Cart: $i</p>";  // for some reason this doesn't show as intended

                    $total = 0;

                    foreach ($cart->products as $product) {
                        $currentProduct = GET("https://fakestoreapi.com/products/" . $product->productId);
                        $subtotal = $currentProduct->price * $product->quantity;
                        $total += $subtotal;

                        echo "<tr> <td>$currentProduct->title</td> <td><img src='$currentProduct->image' alt='Product Image' height='50px'></td> <td>$currentProduct->price</td> <td>$product->quantity</td> <td>$subtotal</td> </tr>";
                    }

                    echo "<tr> <td></td><td></td><td></td><td><b>TOTAL</b></td><td><b>$total</b></td> </tr>";
                }
            ?>
        </table>

    </body>
</html>
