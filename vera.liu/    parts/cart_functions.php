<?php
// Session cart functions - Module 11
if (session_status() === PHP_SESSION_NONE) session_start();

function getCart() {
    return $_SESSION['cart'] ?? [];
}

function addToCart($id, $amount, $color) {
    $cart = getCart();
    $key = $id . '-' . $color;
    if (isset($cart[$key])) {
        $cart[$key]['amount'] += $amount;
    } else {
        $cart[$key] = ['id' => $id, 'amount' => $amount, 'color' => $color];
    }
    $_SESSION['cart'] = $cart;
}

function updateCartItem($key, $amount) {
    $cart = getCart();
    if (isset($cart[$key])) {
        $cart[$key]['amount'] = $amount;
        $_SESSION['cart'] = $cart;
    }
}

function deleteCartItem($key) {
    $cart = getCart();
    unset($cart[$key]);
    $_SESSION['cart'] = $cart;
}

function resetCart() {
    $_SESSION['cart'] = [];
}

function cartTotals($items) {
    $subtotal = 0;
    foreach ($items as $item) $subtotal += $item['total'];
    $tax = round($subtotal * 0.0725, 2); // Class example tax rate
    return ['subtotal' => $subtotal, 'tax' => $tax, 'total' => $subtotal + $tax];
}

function cartItemsFromDatabase($conn) {
    $items = [];
    foreach (getCart() as $key => $entry) {
        $id = (int)$entry['id'];
        $stmt = $conn->prepare('SELECT id, name, price FROM products WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $product = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        if (!$product) continue;
        $product['key'] = $key;
        $product['color'] = $entry['color'];
        $product['amount'] = (int)$entry['amount'];
        $product['total'] = (float)$product['price'] * $product['amount'];
        $items[] = $product;
    }
    return $items;
}
