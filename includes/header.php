<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <a href="index.php"><?php echo SITE_NAME; ?></a>
            </div>
            <div class="nav-menu">
    <a href="index.php">Home</a>
    <a href="products.php">Products</a>
    <a href="about.php">About</a>
    <a href="contact.php">Contact</a>
    <a href="cart.php">Cart 
        <?php if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
            <span class="cart-count">(<?php echo count($_SESSION['cart']); ?>)</span>
        <?php endif; ?>
    </a>
    <?php if(isset($_SESSION['user_id'])): ?>
        <a href="logout.php">Logout (<?php echo $_SESSION['user_name']; ?>)</a>
    <?php else: ?>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    <?php endif; ?>
</div>
        </div>
    </nav>