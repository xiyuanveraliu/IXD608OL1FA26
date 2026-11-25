<?php
// Cart Page - Module 11

// Get cart functions and database connection
require __DIR__ . '/parts/cart_functions.php';
require __DIR__ . '/config.php';

// Get cart items
$items = cartItemsFromDatabase($conn);

// Calculate cart totals
$totals = cartTotals($items);

// Include header
include __DIR__ . '/parts/header.php';
?>

<main>

    <!-- Cart Header -->
    <section class="hero">

        <p>LUNE JEWELRY</p>

        <h2>Your Shopping Bag</h2>

        <p>A little something special, just for you.</p>

    </section>


    <!-- Cart Items -->
    <section class="products">

        <h2>Your Items</h2>

        <div class="product-grid">

            <?php if ($items): ?>

                <?php foreach ($items as $item): ?>

                    <div class="product-card">

                        <h3>
                            <?= htmlspecialchars($item['name']) ?>
                        </h3>

                        <p>
                            Pearl Color:
                            <?= htmlspecialchars($item['color']) ?>
                        </p>

                        <p>
                            Price:
                            $<?= number_format((float)$item['price'], 2) ?>
                        </p>

                        <!-- Update Quantity -->
                        <form action="cart_actions.php?action=update-cart-item" method="post">

                            <input
                                type="hidden"
                                name="key"
                                value="<?= htmlspecialchars($item['key']) ?>"
                            >

                            <p>
                                <label for="amount-<?= htmlspecialchars($item['key']) ?>">
                                    Quantity
                                </label>
                            </p>

                            <select
                                name="amount"
                                id="amount-<?= htmlspecialchars($item['key']) ?>"
                            >

                                <?php for ($i = 1; $i <= 10; $i++): ?>

                                    <option
                                        value="<?= $i ?>"
                                        <?= $i === $item['amount'] ? 'selected' : '' ?>
                                    >
                                        <?= $i ?>
                                    </option>

                                <?php endfor; ?>

                            </select>

                            <p>
                                <input
                                    type="submit"
                                    value="Update"
                                    class="button"
                                >
                            </p>

                        </form>

                        <!-- Item Total -->
                        <p>
                            Item Total:
                            $<?= number_format($item['total'], 2) ?>
                        </p>

                        <!-- Remove Item -->
                        <form action="cart_actions.php?action=delete-cart-item" method="post">

                            <input
                                type="hidden"
                                name="key"
                                value="<?= htmlspecialchars($item['key']) ?>"
                            >

                            <input
                                type="submit"
                                value="Remove"
                            >

                        </form>

                    </div>

                <?php endforeach; ?>

            <?php else: ?>

                <p>Your shopping bag is empty.</p>

            <?php endif; ?>

        </div>

    </section>


    <!-- Cart Summary -->
    <section class="about">

        <h2>Order Summary</h2>

        <p>
            Subtotal:
            $<?= number_format($totals['subtotal'], 2) ?>
        </p>

        <p>
            Taxes (7.25% class example):
            $<?= number_format($totals['tax'], 2) ?>
        </p>

        <p>
            <strong>
                Total:
                $<?= number_format($totals['total'], 2) ?>
            </strong>
        </p>

        <?php if ($items): ?>

            <!-- Checkout -->
            <p>
                <a href="checkout.php" class="button">
                    Checkout
                </a>
            </p>

            <!-- Clear Cart -->
            <form action="cart_actions.php?action=reset-cart" method="post">

                <p>
                    <input
                        type="submit"
                        value="Clear Bag"
                    >
                </p>

            </form>

        <?php endif; ?>

        <!-- Continue Shopping -->
        <p>
            <a href="shop.php" class="button">
                Continue Shopping
            </a>
        </p>

    </section>

</main>

<?php include __DIR__ . '/parts/footer.php'; ?>

</body>
</html>

<?php $conn->close(); ?>