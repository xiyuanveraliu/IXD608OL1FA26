<?php
require __DIR__ . '/parts/cart_functions.php';
$complete = $_SESSION['checkout_complete'] ?? false;
unset($_SESSION['checkout_complete']);
include __DIR__ . '/parts/header.php';
?>
<main><section class="hero">
<?php if ($complete): ?>
<h2>Thank You for Your Purchase!</h2><p>This was a simulated checkout. No payment was collected.</p>
<?php else: ?>
<h2>No Recent Checkout</h2>
<?php endif; ?>
<a href="shop.php" class="button">Continue Shopping</a>
</section></main>
<?php include __DIR__ . '/parts/footer.php'; ?>
</body></html>
