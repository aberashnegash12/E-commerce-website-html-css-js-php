<?php include 'includes/header.php'; ?>

<div class="container">
    <h1>All Products</h1>
    
    <div class="products-grid">
        <?php
        $stmt = $pdo->query("SELECT * FROM products");
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
</div>

<?php include 'includes/footer.php'; ?>