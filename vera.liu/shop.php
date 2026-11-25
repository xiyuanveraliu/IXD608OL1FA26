<?php
// Connect to MySQL database
require __DIR__ . '/config.php';

// Get products
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

include __DIR__ . '/parts/header.php';
?>

<main>

    <section class="hero">
        <p>LUNE JEWELRY</p>
        <h2>Shop Collection</h2>
        <p>Natural pearls, thoughtfully selected for everyday wear.</p>
    </section>

    <section class="products">

        <h2>Our Pieces</h2>

        <div class="product-grid">

            <?php if ($result && $result->num_rows > 0): ?>

                <?php while ($product = $result->fetch_assoc()): ?>

                    <div class="product-card">

                        <h3>
                            <?= htmlspecialchars($product['name']) ?>
                        </h3>

                        <p>
                            $<?= number_format((float)$product['price'], 2) ?>
                        </p>

                        <a
                            href="product.php?id=<?= (int)$product['id'] ?>"
                            class="button"
                        >
                            View Details
                        </a>

                    </div>

                <?php endwhile; ?>

            <?php else: ?>

                <p>No products available.</p>

            <?php endif; ?>

        </div>

    </section>

</main>

<?php include __DIR__ . '/parts/footer.php'; ?>

</body>
</html>

<?php $conn->close(); ?>
