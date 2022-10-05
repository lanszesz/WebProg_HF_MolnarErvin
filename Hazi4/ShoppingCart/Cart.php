<?php

    namespace ShoppingCart;

    class Cart
    {
        /**
         * @var CartItem[]
         */
        private array $items = [];

        /**
         * @return CartItem[]
         */
        public function getItems(): array
        {
            return $this->items;
        }

        /**
         * @param CartItem[] $items
         */
        public function setItems(array $items): void
        {
            $this->items = $items;
        }

        /**
         * Add Product $product into cart. If product already exists inside cart
         * it must update quantity.
         * This must create CartItem and return CartItem from method
         * Bonus: $quantity must not become more than whatever
         * is $availableQuantity of the Product
         *
         * @param Product $product
         * @param int $quantity
         * @return CartItem
         */
        public function addProduct(Product $product, int $quantity): CartItem
        {
            $quantityAvailable = $product->getAvailableQuantity();

            if ($quantityAvailable < $quantity) {
                echo "<p style='color: red'>ERROR: Available quantity was $quantityAvailable, you wanted $quantity.</p><br>";

                $product->setAvailableQuantity(0);
                $newCartItem = new CartItem($product, $quantityAvailable);

                return $newCartItem;
            }

            $product->setAvailableQuantity($quantityAvailable - $quantity);

            $newCartItem = new CartItem($product, $quantity);

            array_push($this->items, $newCartItem);

            return $newCartItem;
        }

        /**
         * Remove product from cart
         *
         * @param Product $product
         */
        public function removeProduct(Product $product)
        {
            $items = $this->getItems();

            foreach ($items as $key => $item) {
                if ($item->getProduct() == $product) {
                    unset($items[$key]);
                    $this->setItems($items);
                }
            }
        }

        /**
         * This returns total number of products added in cart
         *
         * @return int
         */
        public function getTotalQuantity(): int
        {
            $quantitySum = 0;

            foreach ($this->getItems() as $item) {
                $quantitySum += $item->getQuantity();
            }

            return $quantitySum;
        }

        /**
         * This returns total price of products added in cart
         *
         * @return float
         */
        public function getTotalSum(): float
        {
            $priceSum = 0;

            foreach($this->getItems() as $item) {
                $priceSum += $item->getProduct()->getPrice() * $item->getQuantity();
            }

            return $priceSum;
        }
    }