<?php

class Cart
{
    public static function addProduct($id) {

    $id = intval($id);

    $productsInCart = array();

    if (isset($_SESSION['cart'])) {
        $productsInCart = $_SESSION['cart'];
    }
    if (array_key_exists($id, $productsInCart)) {
        $productsInCart[$id]++;
    } else {
        $productsInCart[$id] = 1;
    }

    $_SESSION['cart'] = $productsInCart;

    return self::countItems();
    }

    public static function countItems() {
        if (isset($_SESSION['cart'])) {
            $count = 0;
            foreach ($_SESSION['cart'] as $id => $nb) {
                $count = $count + $nb;
            }
            return $count;
        } else {
            return 0;
        }
    }

    public static function getProducts() {
        if (isset($_SESSION['cart'])) {
            return $_SESSION['cart'];
        }
        return false;
    }


    public static function getTotalPrice($products) {

        $productsInCart = self::getProducts();

        $total = 0;
        if ($productsInCart) {
            foreach ($products as $item) {
                $total += $item['price'] * $productsInCart[$item['id']];
            }
        }

        return $total;
    }

    public static function clear()
    {
        if (isset($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }
    }


    public static function deleteProduct($id)
    {
        $productsInCart = self::getProducts();

        unset($productsInCart[$id]);

        $_SESSION['cart'] = $productsInCart;
    }
}