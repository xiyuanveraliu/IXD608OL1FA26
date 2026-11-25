<?php
// Connect to MySQL database
require __DIR__ . '/config.php';

// Get search, sort, and filter values
$search = trim($_GET['search'] ?? '');
$sort = $_GET['sort'] ?? '';
$filter = $_GET['filter'] ?? '';

// Get products
$sql = "SELECT * FROM products WHERE 1=1";

// Search by product name
if ($search !== '') {
    $sql .= " AND name LIKE ?";
}

// Filter by price
if ($filter === 'under100') {
    $sql .= " AND price < 100";
} elseif ($filter === '100to200') {
    $sql .= " AND price >= 100 AND price <= 200";
} elseif ($filter === 'over200') {
    $sql .= " AND price > 200";
}

// Sort products
if ($sort === 'low') {
    $sql .= " ORDER BY price ASC";
} elseif ($sort === 'high') {
    $sql .= " ORDER BY price DESC";
} elseif ($sort === 'name') {
    $sql .= " ORDER BY name ASC";
} else {
    $sql .= " ORDER BY id ASC";
}

// Run query
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Unable to load products.");
}

if ($search !== '') {
    $searchValue = "%" . $search . "%";
    $stmt->bind_param("s", $searchValue);
}

$stmt->execute();
$result = $stmt->get_result();

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

        <!-- Search -->
        <form method="GET" action="shop.php" class="shop-controls">

            <input
                type="text"
                name="search"
                placeholder="Search products"
                value="<?= htmlspecialchars($search) ?>"
            >

            <button type="submit" class="button">
                Search
            </button>

        </form>

        <!-- Sort -->
        <form method="GET" action="shop.php" class="shop-controls">

            <select name="sort">
                <option value="">Sort Products</option>
                <option value="low" <?= $sort === 'low' ? 'selected' : '' ?>>
                    Price: Low to High
                </option>
                <option value="high" <?= $sort === 'high' ? 'selected' : '' ?>>
                    Price: High to Low
                </option>
                <option value="name" <?= $sort === 'name' ? 'selected' : '' ?>>
                    Name: A to Z
                </option>
            </select>

            <button type="submit" class="button">
                Sort
            </button>

        </form>

        <!-- Filter -->
        <form method="GET" action="shop.php" class="shop-controls">

            <select name="filter">
                <option value="">All Prices</option>
                <option value="under100" <?= $filter === 'under100' ? 'selected' : '' ?>>
                    Under $100
                </option>
                <option value="100to200" <?= $filter === '100to200' ? 'selected' : '' ?>>
                    $100 - $200
                </option>
                <option value="over200" <?= $filter === 'over200' ? 'selected' : '' ?>>
                    Over $200
                </option>
            </select>

            <button type="submit" class="button">
                Filter
            </button>

        </form>

        <a href="shop.php" class="button">Show All Products</a>

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

                <p>No products found.</p>

            <?php endif; ?>

        </div>

    </section>

</main>

<?php include __DIR__ . '/parts/footer.php'; ?>

</body>
</html>

<?php
$stmt->close();
$conn->close();
?>