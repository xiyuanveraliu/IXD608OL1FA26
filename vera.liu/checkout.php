<?php
// Checkout Page - Module 11

// Get cart functions and database connection
require __DIR__ . '/parts/cart_functions.php';
require __DIR__ . '/config.php';

// Get cart items
$items = cartItemsFromDatabase($conn);

// Calculate cart totals
$totals = cartTotals($items);

// Redirect if cart is empty
if (!$items) {
    header('Location: cart.php');
    exit;
}

// Include header
include __DIR__ . '/parts/header.php';
?>

<main>

    <!-- Checkout Header -->
    <section class="hero">

        <p>LUNE JEWELRY</p>

        <h2>Checkout</h2>

        <p>Class demonstration only — no real payment.</p>

    </section>

    <!-- Checkout Form -->
    <section class="about">

        <h2>Shipping Information</h2>

        <form action="checkout_actions.php" method="post">

            <p>
                <label for="customer_name">Name</label><br>
                <input
                    type="text"
                    name="customer_name"
                    id="customer_name"
                    required
                >
            </p>

            <p>
                <label for="address">Address</label><br>
                <input
                    type="text"
                    name="address"
                    id="address"
                    required
                >
            </p>

            <p>
                <label for="city">City</label><br>
                <input
                    type="text"
                    name="city"
                    id="city"
                    required
                >
            </p>

            <p>
                <label for="zip">ZIP Code</label><br>
                <input
                    type="text"
                    name="zip"
                    id="zip"
                    required
                >
            </p>

            <!-- Order Total -->
            <p>
                <strong>
                    Total:
                    $<?= number_format($totals['total'], 2) ?>
                </strong>
            </p>

            <!-- Complete Checkout -->
            <p>
                <input
                    type="submit"
                    class="button"
                    value="Complete Fake Checkout"
                >
            </p>

        </form>

    </section>

</main>

<?php include __DIR__ . '/parts/footer.php'; ?>

</body>
</html>

<?php $conn->close(); ?>