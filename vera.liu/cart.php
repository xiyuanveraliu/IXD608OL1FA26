<?php
// Connect to database
$conn = new mysqli(
    "localhost",
    "aau_user",
    'sPeIOHz4K$GU1J.)',
    "aau_products"
);

// Get product ID
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$product = null;

// Find product
if ($id > 0) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    $stmt->close();
}

include __DIR__ . '/parts/header.php';
?>

<main>

    <!-- Cart Hero -->
    <section class="hero">

        <p>LUNE JEWELRY</p>

        <h2>Your Shopping Bag</h2>

        <p>A little something special, just for you.</p>

    </section>

    <!-- Cart Items -->
    <section class="products">

        <h2>Your Items</h2>

        <div class="product-grid">

            <?php if ($product): ?>

                <div class="product-card">

                    <h3>
                        <?= htmlspecialchars($product['name']) ?>
                    </h3>

                    <p>Quantity: 1</p>

                    <p>
                        $<?= number_format((float)$product['price'], 2) ?>
                    </p>

                </div>

            <?php else: ?>

                <p>Your shopping bag is empty.</p>

            <?php endif; ?>

        </div>

    </section>

    <!-- Cart Summary -->
    <section class="about">

        <h2>Order Summary</h2>

        <?php if ($product): ?>

            <p>
                Subtotal:
                $<?= number_format((float)$product['price'], 2) ?>
            </p>

            <p>
                Shipping and taxes will be calculated at checkout.
            </p>

            <button type="button">
                Proceed to Checkout
            </button>

        <?php else: ?>

            <p>No items in your bag yet.</p>

        <?php endif; ?>

        <p>
            <a href="shop.php">Continue Shopping</a>
        </p>

    </section>

</main>

<?php include __DIR__ . '/parts/footer.php'; ?>

</body>
</html>

<?php $conn->close(); ?>