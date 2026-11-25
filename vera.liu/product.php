<?php
// Connect to database
require __DIR__ . '/config.php';

// Get product ID
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$product = null;

// Get product details
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

            <!-- Add to Cart Form -->
            <form action="cart_actions.php?action=add-to-cart" method="post">

                <input
                    type="hidden"
                    name="product-id"
                    value="<?= (int)$product['id'] ?>"
                >

                <!-- Pearl Color -->
                <p>
                    <label for="color">Pearl Color</label>
                </p>

                <select name="color" id="color">

                    <option value="White">White</option>
                    <option value="Pink">Pink</option>
                    <option value="Lavender">Lavender</option>

                </select>

                <!-- Quantity -->
                <p>
                    <label for="amount">Quantity</label>
                </p>

                <select name="amount" id="amount">

                    <?php for ($i = 1; $i <= 10; $i++): ?>

                        <option value="<?= $i ?>">
                            <?= $i ?>
                        </option>

                    <?php endfor; ?>

                </select>

                <!-- Add to Cart Button -->
                <p>
                    <input
                        type="submit"
                        class="button"
                        value="Add to Cart"
                    >
                </p>

            </form>

        </section>


        <!-- Product Information -->
        <section class="about">

            <h2>Product Details</h2>

            <p>
                Category:
                <?= htmlspecialchars($product['category'] ?? '') ?>
            </p>

            <p>
                Natural pearls, thoughtfully selected for everyday wear.
            </p>

            <a href="shop.php" class="button">
                Back to Shop
            </a>

        </section>

    <?php else: ?>

        <!-- Product Not Found -->
        <section class="hero">

            <h2>Product Not Found</h2>

            <p>Sorry, this product is not available.</p>

            <a href="shop.php" class="button">
                Back to Shop
            </a>

        </section>

    <?php endif; ?>

</main>

<?php include __DIR__ . '/parts/footer.php'; ?>

</body>
</html>

<?php $conn->close(); ?>