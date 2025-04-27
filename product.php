<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopEasy - Products</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Navigation Bar (consistent with homepage) -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="#" class="logo">ShopEasy</a>
            <div class="nav-links">
                <a href="index.php">Home</a>
                <a href="product.php" class="active">Products</a>
                <a href="about.php">About</a>
                <a href="contact.php">Contact</a>
            </div>
            <div class="nav-icons">
                <a href="#" id="search-btn"><i class="fas fa-search"></i></a>
                <a href="#" id="user-btn"><i class="fas fa-user"></i></a>
                <a href="#" id="cart-btn"><i class="fas fa-shopping-cart"></i><span id="cart-count">0</span></a>
            </div>
        </div>
    </nav>

    <!-- Search Form (consistent with homepage) -->
    <div class="search-form-container" id="search-form">
        <form action="">
            <input type="search" placeholder="Search here..." id="search-box">
            <label for="search-box" class="fas fa-search"></label>
            <i class="fas fa-times" id="close-search"></i>
        </form>
    </div>

    <!-- Product Page Header -->
    <section class="page-header">
        <h1>Our Products</h1>
        <p>Browse our wide selection of quality items</p>
    </section>

    <!-- Product Grid Section -->
    <section class="product-grid">
        <div class="grid-controls">
            <div class="sort-options">
                <label for="sort">Sort by:</label>
                <select id="sort">
                    <option value="default">Default</option>
                    <option value="price-low">Price: Low to High</option>
                    <option value="price-high">Price: High to Low</option>
                    <option value="name-asc">Name: A-Z</option>
                    <option value="name-desc">Name: Z-A</option>
                </select>
            </div>
            <div class="view-options">
                <button class="view-btn active" data-view="grid"><i class="fas fa-th"></i></button>
                <button class="view-btn" data-view="list"><i class="fas fa-list"></i></button>
            </div>
        </div>

        <div class="grid-container" id="product-grid">
            <!-- Product cards will be loaded here -->
            <div class="product-card" data-category="electronics">
                <div class="product-badge">Sale</div>
                <div class="product-image">
                    <img src="https://via.placeholder.com/300x300" alt="Smartphone">
                    <div class="product-actions">
                        <button class="quick-view" data-id="1">Quick View</button>
                        <button class="add-to-wishlist"><i class="far fa-heart"></i></button>
                    </div>
                </div>
                <div class="product-info">
                    <h3 class="product-title">Premium Smartphone</h3>
                    <div class="product-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span>(24)</span>
                    </div>
                    <div class="product-price">
                        <span class="current-price">$599.99</span>
                        <span class="original-price">$699.99</span>
                    </div>
                    <button class="add-to-cart" data-id="1">Add to Cart</button>
                </div>
            </div>

            <div class="product-card" data-category="electronics">
                <div class="product-badge">Sale</div>
                <div class="product-image">
                    <img src="product-image.jpg" alt="Product">
                    <div class="product-actions">
                        <button class="quick-view" data-id="1">Quick View</button>
                        <button class="add-to-wishlist"><i class="far fa-heart"></i></button>
                    </div>
                </div>
                <div class="product-info">
                    <h3 class="product-title">Product Name</h3>
                    <div class="product-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <span>(24)</span>
                    </div>
                    <div class="product-price">
                        <span class="current-price">$99.99</span>
                        <span class="original-price">$129.99</span>
                    </div>
                    <button class="add-to-cart" data-id="1">Add to Cart</button>
                </div>
            </div>

            <div class="product-card" data-category="home">
                <div class="product-badge">New</div>
                <div class="product-image">
                    <img src="https://via.placeholder.com/300x300" alt="Coffee Maker">
                    <div class="product-actions">
                        <button class="quick-view" data-id="3">Quick View</button>
                        <button class="add-to-wishlist"><i class="far fa-heart"></i></button>
                    </div>
                </div>
                <div class="product-info">
                    <h3 class="product-title">Automatic Coffee Maker</h3>
                    <div class="product-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span>(42)</span>
                    </div>
                    <div class="product-price">
                        <span class="current-price">$129.99</span>
                    </div>
                    <button class="add-to-cart" data-id="3">Add to Cart</button>
                </div>
            </div>

            <div class="product-card" data-category="electronics">
                <div class="product-image">
                    <img src="https://via.placeholder.com/300x300" alt="Wireless Earbuds">
                    <div class="product-actions">
                        <button class="quick-view" data-id="4">Quick View</button>
                        <button class="add-to-wishlist"><i class="far fa-heart"></i></button>
                    </div>
                </div>
                <div class="product-info">
                    <h3 class="product-title">Wireless Earbuds</h3>
                    <div class="product-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <span>(31)</span>
                    </div>
                    <div class="product-price">
                        <span class="current-price">$79.99</span>
                    </div>
                    <button class="add-to-cart" data-id="4">Add to Cart</button>
                </div>
            </div>

            <div class="product-card" data-category="clothing">
                <div class="product-badge">-20%</div>
                <div class="product-image">
                    <img src="https://via.placeholder.com/300x300" alt="Denim Jeans">
                    <div class="product-actions">
                        <button class="quick-view" data-id="5">Quick View</button>
                        <button class="add-to-wishlist"><i class="far fa-heart"></i></button>
                    </div>
                </div>
                <div class="product-info">
                    <h3 class="product-title">Slim Fit Jeans</h3>
                    <div class="product-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <i class="far fa-star"></i>
                        <span>(15)</span>
                    </div>
                    <div class="product-price">
                        <span class="current-price">$45.99</span>
                        <span class="original-price">$57.49</span>
                    </div>
                    <button class="add-to-cart" data-id="5">Add to Cart</button>
                </div>
            </div>

            <div class="product-card" data-category="home">
                <div class="product-image">
                    <img src="https://via.placeholder.com/300x300" alt="Desk Lamp">
                    <div class="product-actions">
                        <button class="quick-view" data-id="6">Quick View</button>
                        <button class="add-to-wishlist"><i class="far fa-heart"></i></button>
                    </div>
                </div>
                <div class="product-info">
                    <h3 class="product-title">LED Desk Lamp</h3>
                    <div class="product-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span>(27)</span>
                    </div>
                    <div class="product-price">
                        <span class="current-price">$34.99</span>
                    </div>
                    <button class="add-to-cart" data-id="6">Add to Cart</button>
                </div>
            </div>
        </div>

        <div class="pagination">
            <button class="page-btn active">1</button>
            <button class="page-btn">2</button>
            <button class="page-btn">3</button>
            <button class="page-btn next-btn">Next <i class="fas fa-chevron-right"></i></button>
        </div>
    </section>

    <!-- Quick View Modal -->
    <div class="quick-view-modal" id="quick-view-modal">
        <div class="modal-content">
            <button class="close-modal">&times;</button>
            <div class="modal-body">
                <!-- Content will be loaded by JavaScript -->
            </div>
        </div>
    </div>

    <!-- Shopping Cart Sidebar (consistent with homepage) -->
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

    <!-- Footer (consistent with homepage) -->
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