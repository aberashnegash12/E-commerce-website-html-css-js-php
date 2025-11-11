<?php include 'includes/header.php'; 

if(!isset($_GET['id'])) {
    header('Location: products.php');
    exit;
}

$product_id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$product_id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$product) {
    header('Location: products.php');
    exit;
}
?>

<div class="container">
    <div class="product-detail">
        <div class="product-image">
            <img src="images/products/<?php echo $product['image']; ?>" 
                 alt="<?php echo $product['name']; ?>">
        </div>
        <div class="product-info">
            <h1><?php echo $product['name']; ?></h1>
            <p class="product-price">$<?php echo $product['price']; ?></p>
            <p class="product-description"><?php echo $product['description']; ?></p>
            
            <form action="cart.php" method="POST" class="add-to-cart-form">
                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                <input type="hidden" name="action" value="add">
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" class="quantity-input">
                </div>
                <button type="submit" class="btn">Add to Cart</button>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>