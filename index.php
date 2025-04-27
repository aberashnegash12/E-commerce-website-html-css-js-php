<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopEasy - Your Online Store</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="#" class="logo">ShopEasy</a>
            <div class="nav-links">
                <a href="index.php">Home</a>
                <a href="product.php">Products</a>
                <a href="about.php">About</a>
                <a href="contact.php">Contact</a>
            </div>
            <div class="nav-icons">
                <a href="#" id="search-btn"><i class="fas fa-search"></i></a>
                <a href="#" id="user-btn"><i class="fas fa-user"></i></a>
                <a href="#" id="cart-btn"><i class="fas fa-shopping-cart"></i><span id="cart-count">0</span></a>
            </div>
        </div>
        <!-- User Modal -->
<div class="user-modal" id="user-modal">
    <div class="modal-content">
        <button class="close-modal">&times;</button>
        <div class="modal-tabs">
            <button class="tab-btn active" data-tab="login">Login</button>
            <button class="tab-btn" data-tab="register">Register</button>
        </div>
        
        <div class="tab-content active" id="login-tab">
            <form id="login-form">
                <div class="form-group">
                    <input type="text" id="login-username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <input type="password" id="login-password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>
        
        <div class="tab-content" id="register-tab">
            <form id="register-form">
                <div class="form-group">
                    <input type="text" id="register-username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <input type="email" id="register-email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" id="register-password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input type="password" id="register-confirm" placeholder="Confirm Password" required>
                </div>
                <button type="submit" class="btn">Register</button>
            </form>
        </div>
    </div>
</div>
    </nav>

    <!-- Search Form -->
    <div class="search-form-container" id="search-form">
        <form action="">
            <input type="search" placeholder="Search here..." id="search-box">
            <label for="search-box" class="fas fa-search"></label>
            <i class="fas fa-times" id="close-search"></i>
        </form>
    </div>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Welcome to ShopEasy</h1>
            <p>Discover amazing products at unbeatable prices</p>
            <a href="product.php" class="btn">Shop Now</a>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products" id="products">
        <h2 class="section-title">Our Products</h2>
        <div class="filter-buttons">
            <button class="filter-btn active" data-filter="all">All</button>
            <button class="filter-btn" data-filter="electronics">Electronics</button>
            <button class="filter-btn" data-filter="clothing">Clothing</button>
            <button class="filter-btn" data-filter="home">Home</button>
        </div>
        <div class="product-container" id="product-container">
            <!-- Products will be loaded here by JavaScript -->
        </div>
    </section>

    <!-- Shopping Cart Sidebar -->
    <div class="cart-sidebar" id="cart-sidebar">
        <div class="cart-header">
            <h3>Your Cart</h3>
            <button id="close-cart">&times;</button>
        </div>
        <div class="cart-items" id="cart-items">
            <!-- Cart items will be loaded here -->
        </div>
        <div class="cart-footer">
            <div class="cart-total">
                <h4>Total: $<span id="cart-total">0.00</span></h4>
            </div>
            <button class="btn checkout-btn">Proceed to Checkout</button>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <h3>ShopEasy</h3>
                <p>Your one-stop shop for all your needs.</p>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="product.php">Products</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Contact Us</h3>
                <p>Email: info@shopeasy.com</p>
                <p>Phone: +1 234 567 890</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2023 ShopEasy. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>