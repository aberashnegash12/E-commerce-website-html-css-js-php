<?php include 'includes/header.php'; 

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['action'])) {
        if($_POST['action'] == 'add') {
            $product_id = $_POST['product_id'];
            $quantity = $_POST['quantity'];
            
            if(!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }
            
            if(isset($_SESSION['cart'][$product_id])) {
                $_SESSION['cart'][$product_id] += $quantity;
            } else {
                $_SESSION['cart'][$product_id] = $quantity;
            }
            
            header('Location: cart.php');
            exit;
        } elseif($_POST['action'] == 'update') {
            foreach($_POST['quantities'] as $product_id => $quantity) {
                if($quantity <= 0) {
                    unset($_SESSION['cart'][$product_id]);
                } else {
                    $_SESSION['cart'][$product_id] = $quantity;
                }
            }
        } elseif($_POST['action'] == 'remove') {
            $product_id = $_POST['product_id'];
            unset($_SESSION['cart'][$product_id]);
        }
    }
}
?>

<div class="container">
    <h1>Shopping Cart</h1>
    
    <?php if(empty($_SESSION['cart'])): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <form action="cart.php" method="POST">
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $total = 0;
                    foreach($_SESSION['cart'] as $product_id => $quantity): 
                        $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
                        $stmt->execute([$product_id]);
                        $product = $stmt->fetch(PDO::FETCH_ASSOC); // FIXED: ASSOB to ASSOC
                        if($product) { // Added check to ensure product exists
                            $subtotal = $product['price'] * $quantity;
                            $total += $subtotal;
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($product['name']); ?></td>
                        <td>$<?php echo number_format($product['price'], 2); ?></td>
                        <td>
                            <input type="number" name="quantities[<?php echo $product_id; ?>]" 
                                   value="<?php echo $quantity; ?>" min="0" class="quantity-input">
                        </td>
                        <td>$<?php echo number_format($subtotal, 2); ?></td>
                        <td>
                            <button type="submit" name="action" value="remove" 
                                    class="btn btn-danger">Remove</button>
                            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                        </td>
                    </tr>
                    <?php 
                        } // End of if($product) check
                    endforeach; 
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3"><strong>Total</strong></td>
                        <td colspan="2"><strong>$<?php echo number_format($total, 2); ?></strong></td>
                    </tr>
                </tfoot>
            </table>
            
            <div class="cart-actions">
                <button type="submit" name="action" value="update" class="btn">Update Cart</button>
                <a href="checkout.php" class="btn">Proceed to Checkout</a>
            </div>
        </form>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>