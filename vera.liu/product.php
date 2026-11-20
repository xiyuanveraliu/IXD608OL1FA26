<?php
// Connect to MySQL database
$conn = new mysqli(
    "localhost",
    "aau_user",
    'sPeIOHz4K$GU1J.)',
    "aau_products"
);

// Get product ID from URL
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

// Get product details
$product = null;

if ($id && $id > 0) {
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

    <?php if ($product): ?>

        <!-- Product Details -->
        <section class="hero">

            <p>LUNE JEWELRY</p>

            <h2>
                <?= htmlspecialchars($product['name']) ?>
            </h2>

            <p>
                $<?= number_format((float)$product['price'], 2) ?>
            </p>

            <p>
                <?= nl2br(htmlspecialchars($product['description'] ?? '')) ?>
            </p>

           <a href="cart.php?id=<?= (int)$product['id'] ?>" class="button">
           Add to Cart
        </a>

        </section>

        <!-- Product Information -->
        <section class="about">

            <h2>Product Details</h2>

            <p>
                Category:
                <?= htmlspecialchars($product['category'] ?? '') ?>
            </p>

            <p>Natural pearls, thoughtfully selected for everyday wear.</p>

            <a href="shop.php" class="button">Back to Shop</a>

        </section>

    <?php else: ?>

        <section class="hero">

            <h2>Product Not Found</h2>

            <p>Sorry, this product is not available.</p>

            <a href="shop.php" class="button">Back to Shop</a>

        </section>

    <?php endif; ?>

</main>

<?php include __DIR__ . '/parts/footer.php'; ?>

</body>
</html>

<?php $conn->close(); ?>