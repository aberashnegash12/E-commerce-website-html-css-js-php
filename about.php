<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - ShopEasy</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Navigation Bar (same as index.html) -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="index.html" class="logo">ShopEasy</a>
            <div class="nav-links">
                <a href="index.php">Home</a>
                <a href="index.php#products">Products</a>
                <a href="about.php" class="active">About</a>
                <a href="contact.hphptml">Contact</a>
            </div>
            <div class="nav-icons">
                <a href="#" id="search-btn"><i class="fas fa-search"></i></a>
                <a href="#" id="user-btn"><i class="fas fa-user"></i></a>
                <a href="#" id="cart-btn"><i class="fas fa-shopping-cart"></i><span id="cart-count">0</span></a>
            </div>
        </div>
    </nav>

    <!-- Search Form (same as index.html) -->
    <div class="search-form-container" id="search-form">
        <form action="">
            <input type="search" placeholder="Search here..." id="search-box">
            <label for="search-box" class="fas fa-search"></label>
            <i class="fas fa-times" id="close-search"></i>
        </form>
    </div>

    <!-- About Hero Section -->
    <section class="about-hero">
        <div class="about-hero-content">
            <h1>Our Story</h1>
            <p>Discover the journey behind ShopEasy</p>
        </div>
    </section>

    <!-- About Content -->
    <section class="about-content">
        <div class="about-container">
            <div class="about-text">
                <h2>Who We Are</h2>
                <p>ShopEasy was founded in 2020 with a simple mission: to make online shopping easy, enjoyable, and accessible to everyone. What started as a small team of e-commerce enthusiasts has grown into a trusted platform serving thousands of customers worldwide.</p>
                
                <h2>Our Values</h2>
                <div class="values-grid">
                    <div class="value-card">
                        <i class="fas fa-shield-alt"></i>
                        <h3>Quality</h3>
                        <p>We carefully curate our products to ensure they meet the highest standards.</p>
                    </div>
                    <div class="value-card">
                        <i class="fas fa-hand-holding-usd"></i>
                        <h3>Value</h3>
                        <p>We work directly with manufacturers to bring you the best prices.</p>
                    </div>
                    <div class="value-card">
                        <i class="fas fa-headset"></i>
                        <h3>Service</h3>
                        <p>Our customer support team is here for you 24/7.</p>
                    </div>
                    <div class="value-card">
                        <i class="fas fa-truck"></i>
                        <h3>Speed</h3>
                        <p>Fast shipping and easy returns make shopping stress-free.</p>
                    </div>
                </div>
            </div>
            
            <div class="about-image">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Our Team">
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <h2 class="section-title">Meet The Team</h2>
        <div class="team-grid">
            <div class="team-member">
                <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Sarah Johnson">
                <h3>Sarah Johnson</h3>
                <p>Founder & CEO</p>
            </div>
            <div class="team-member">
                <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Michael Chen">
                <h3>Michael Chen</h3>
                <p>Head of Operations</p>
            </div>
            <div class="team-member">
                <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Jessica Williams">
                <h3>Jessica Williams</h3>
                <p>Customer Experience</p>
            </div>
            <div class="team-member">
                <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="David Kim">
                <h3>David Kim</h3>
                <p>Tech Lead</p>
            </div>
        </div>
    </section>

    <!-- Footer (same as index.html) -->
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
                    <li><a href="index.php#products">Products</a></li>
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

    <!-- Shopping Cart Sidebar (same as index.html) -->
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

    <script src="script.js"></script>
</body>
</html>