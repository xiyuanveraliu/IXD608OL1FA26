<?php
require __DIR__ . '/parts/cart_functions.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !getCart()) {
    header('Location: cart.php');
    exit;
}
if (trim($_POST['customer_name'] ?? '') === '' || trim($_POST['address'] ?? '') === '' || trim($_POST['city'] ?? '') === '' || trim($_POST['zip'] ?? '') === '') {
    header('Location: checkout.php');
    exit;
}
resetCart();
$_SESSION['checkout_complete'] = true;
header('Location: confirmation.php');
exit;
