<?php


    class Product
    {
        private int $id;
        private string $title;
        private float $price;
        private int $availableQuantity;

        /**
         * @param int $id
         * @param string $title
         * @param float $price
         * @param int $availableQuantity
         */
        public function __construct(int $id, string $title, float $price, int $availableQuantity)
        {
            $this->id = $id;
            $this->title = $title;
            $this->price = $price;
            $this->availableQuantity = $availableQuantity;
        }

        /**
         * @return int
         */
        public function getId(): int
        {
            return $this->id;
        }

        /**
         * @param int $id
         */
        public function setId(int $id): void
        {
            $this->id = $id;
        }

        /**
         * @return string
         */
        public function getTitle(): string
        {
            return $this->title;
        }

        /**
         * @param string $title
         */
        public function setTitle(string $title): void
        {
            $this->title = $title;
        }

        /**
         * @return float
         */
        public function getPrice(): float
        {
            return $this->price;
        }

        /**
         * @param float $price
         */
        public function setPrice(float $price): void
        {
            $this->price = $price;
        }

        /**
         * @return int
         */
        public function getAvailableQuantity(): int
        {
            return $this->availableQuantity;
        }

        /**
         * @param int $availableQuantity
         */
        public function setAvailableQuantity(int $availableQuantity): void
        {
            $this->availableQuantity = $availableQuantity;
        }

        /**
         * Add Product $product into cart. If product already exists inside cart
         * it must update quantity.
         * This must create CartItem and return CartItem from method
         * Bonus: $quantity must not become more than whatever
         * is $availableQuantity of the Product
         *
         * @param Cart $cart
         * @param int $quantity
         * @return CartItem
         */
        public function addToCart(Cart $cart, int $quantity): CartItem
        {
            $quantityAvailable = $this->getAvailableQuantity();

            if ($quantityAvailable < $quantity) {
                echo "<p style='color: red'>ERROR: Available quantity was $quantityAvailable, you wanted $quantity.</p><br>";
                $this->setAvailableQuantity(0);
                return $cart->addProduct($this, $quantityAvailable);
            }

            $this->setAvailableQuantity($quantityAvailable - $quantity);

            return $cart->addProduct($this, $quantity);
        }

        /**
         * Remove product from cart
         *
         * @param Cart $cart
         */
        public function removeFromCart(Cart $cart)
        {
            $cart->removeProduct($this);
        }
    }