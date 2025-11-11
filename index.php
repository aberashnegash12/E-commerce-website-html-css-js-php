<?php include 'includes/header.php'; ?>

<div class="container">
    <section class="hero">
        <h1>Welcome to <?php echo SITE_NAME; ?></h1>
        <p>Discover amazing products at great prices</p>
        <a href="products.php" class="btn">Shop Now</a>
    </section>

    <section class="featured-products">
        <h2>Featured Products</h2>
        <div class="products-grid">
            <?php
            $stmt = $pdo->query("SELECT * FROM products WHERE featured = 1 LIMIT 4");
            while($product = $stmt->fetch(PDO::FETCH_ASSOC)):
            ?>
            <div class="product-card">
                <img src="images/products/<?php echo $product['image']; ?>" 
                     alt="<?php echo $product['name']; ?>" class="product-image">
                <h3 class="product-title"><?php echo $product['name']; ?></h3>
                <p class="product-price">$<?php echo $product['price']; ?></p>
                <a href="product-detail.php?id=<?php echo $product['id']; ?>" class="btn">View Details</a>
            </div>
            <?php endwhile; ?>
        </div>
    </section>
</div>

<?php include 'includes/footer.php'; ?>