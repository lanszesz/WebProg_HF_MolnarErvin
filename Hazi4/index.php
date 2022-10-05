<?php

    include "autoload.php";

    use ShoppingCart\Product;
    use ShoppingCart\Cart;
    use ShoppingCart\CartItem;

    $product1 = new Product(1, "iPhone 11", 2500, 10);
    $product2 = new Product(2, "M2 SSD", 400, 10);
    $product3 = new Product(3, "Samsung Galaxy S20", 3200, 10);

    $cart = new Cart();
    $cartItem1 = $cart->addProduct($product1, 1);
    $cartItem2 = $product2->addToCart($cart, 1);

    echo "<br>Number of items in cart: " . PHP_EOL;
    echo $cart->getTotalQuantity() . PHP_EOL; // This must print 2
    echo "<br>Total price of items in cart: " . PHP_EOL;
    echo $cart->getTotalSum() . PHP_EOL; // This must print 2900

    $cartItem2->increaseQuantity();
    $cartItem2->increaseQuantity();

    echo "<br>Number of items in cart: " . PHP_EOL;
    echo $cart->getTotalQuantity() . PHP_EOL; // This must print 4

    echo "<br>Total price of items in cart: " . PHP_EOL;
    echo $cart->getTotalSum() . PHP_EOL; // This must print 3700

    $cart->removeProduct($product1);

    echo "<br>Number of items in cart: " . PHP_EOL;
    echo $cart->getTotalQuantity() . PHP_EOL; // This must print 4 - Ide 4 volt írva, de csak 3 marad

    echo "<br>Total price of items in cart: " . PHP_EOL;
    echo $cart->getTotalSum() . PHP_EOL; // This must print 3700 - Csak 1200 marad
