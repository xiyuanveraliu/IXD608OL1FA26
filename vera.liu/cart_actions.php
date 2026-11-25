<?php
require __DIR__ . '/parts/cart_functions.php';
$action = $_GET['action'] ?? '';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: cart.php');
    exit;
}
switch ($action) {
    case 'add-to-cart':
        $id = filter_input(INPUT_POST, 'product-id', FILTER_VALIDATE_INT);
        $amount = filter_input(INPUT_POST, 'amount', FILTER_VALIDATE_INT);
        $color = $_POST['color'] ?? 'White';
        if ($id && $id > 0 && $amount && $amount >= 1 && $amount <= 10 && in_array($color, ['White', 'Pink', 'Lavender'], true)) {
            require __DIR__ . '/config.php';
            $stmt = $conn->prepare('SELECT id FROM products WHERE id = ?');
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $exists = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            $conn->close();
            if ($exists) {
                addToCart($id, $amount, $color);
                header('Location: product_added_to_cart.php?id=' . $id);
                exit;
            }
        }
        break;
    case 'update-cart-item':
        $key = $_POST['key'] ?? '';
        $amount = filter_input(INPUT_POST, 'amount', FILTER_VALIDATE_INT);
        if ($amount && $amount >= 1 && $amount <= 10) updateCartItem($key, $amount);
        break;
    case 'delete-cart-item':
        deleteCartItem($_POST['key'] ?? '');
        break;
    case 'reset-cart':
        resetCart();
        break;
}
header('Location: cart.php');
exit;
