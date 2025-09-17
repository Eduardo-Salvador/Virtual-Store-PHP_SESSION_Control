<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product = $_POST['product'];
    $price = floatval($_POST['price']);
    $quantity = intval($_POST['quantity']);

    $found = false;

    foreach ($_SESSION['cart'] as &$item) {
        if ($item['product'] === $product) {
            $item['quantity'] += $quantity;
            $found = true;
            break;
        }
    }

    if (!$found) {
        $_SESSION['cart'][] = [
            'product' => $product,
            'price' => $price,
            'quantity' => $quantity
        ];
    }
}

header("Location: products.php");
exit();
?>
