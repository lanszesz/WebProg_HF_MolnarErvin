<?php


    class CartItem
    {
        private Product $product;
        private int $quantity;

        /**
         * @param Product $product
         * @param int $quantity
         */
        public function __construct(Product $product, int $quantity)
        {
            $this->product = $product;
            $this->quantity = $quantity;
        }

        /**
         * @return Product
         */
        public function getProduct(): Product
        {
            return $this->product;
        }

        /**
         * @param Product $product
         */
        public function setProduct(Product $product): void
        {
            $this->product = $product;
        }

        /**
         * @return int
         */
        public function getQuantity(): int
        {
            return $this->quantity;
        }

        /**
         * @param int $quantity
         */
        public function setQuantity(int $quantity): void
        {
            $this->quantity = $quantity;
        }

        public function increaseQuantity()
        {
            $productQuantity = $this->getProduct()->getAvailableQuantity();

            if ($this->getQuantity() + 1 > $productQuantity) {
                echo "<p style='color: red'>ERROR: Cart item quantity cannot be more than the available product quantity: $productQuantity!</p><br>";
                return;
            }

            ++$this->quantity;
        }

        public function decreaseQuantity()
        {
            if ($this->getQuantity() - 1 < 1) {
                echo "<p style='color: red'>ERROR: Cart item quantity cannot be less than 1!</p><br>";
                return;
            }

            --$this->quantity;
        }
    }