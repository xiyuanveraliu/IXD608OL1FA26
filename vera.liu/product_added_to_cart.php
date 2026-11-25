<?php
require __DIR__ . '/parts/cart_functions.php';
require __DIR__ . '/config.php';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$product = null;
if ($id && $id > 0) {
    $stmt = $conn->prepare('SELECT name FROM products WHERE id = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $product = $stmt->get_result()->fetch_assoc();
    $stmt->close();
}
include __DIR__ . '/parts/header.php';
?>
<main><section class="hero">
<h2>Added to Your Bag</h2>
<?php if ($product): ?><p><?= htmlspecialchars($product['name']) ?> was added to your bag.</p><?php endif; ?>
<p><a href="shop.php" class="button">Continue Shopping</a> <a href="cart.php" class="button">Go to Cart</a></p>
</section></main>
<?php include __DIR__ . '/parts/footer.php'; ?>
</body></html>
<?php $conn->close(); ?>
