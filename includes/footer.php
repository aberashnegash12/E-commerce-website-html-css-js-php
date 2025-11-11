    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <h3><?php echo SITE_NAME; ?></h3>
                <p>Your one-stop shop for all your needs. We provide quality products with excellent customer service.</p>
                <div class="social-links">
                    <a href="#" class="social-link">Facebook</a>
                    <a href="#" class="social-link">Twitter</a>
                    <a href="#" class="social-link">Instagram</a>
                    <a href="#" class="social-link">LinkedIn</a>
                </div>
            </div>
            
            <div class="footer-section">
                <h4>Quick Links</h4>
                <ul class="footer-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="faq.php">FAQ</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h4>Customer Service</h4>
                <ul class="footer-links">
                    <li><a href="shipping.php">Shipping Info</a></li>
                    <li><a href="returns.php">Returns & Refunds</a></li>
                    <li><a href="privacy.php">Privacy Policy</a></li>
                    <li><a href="terms.php">Terms of Service</a></li>
                    <li><a href="size-guide.php">Size Guide</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h4>Contact Info</h4>
                <div class="contact-info">
                    <p>📧 Email: support@<?php echo strtolower(SITE_NAME); ?>.com</p>
                    <p>📞 Phone: +1 (555) 123-4567</p>
                    <p>📍 Address: 123 Commerce St, City, State 12345</p>
                    <p>🕒 Hours: Mon-Fri 9AM-6PM EST</p>
                </div>
            </div>
            
            <div class="footer-section">
                <h4>Newsletter</h4>
                <p>Subscribe to get updates on new products and special offers</p>
                <form class="newsletter-form" action="subscribe.php" method="POST">
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Enter your email" required class="form-control">
                    </div>
                    <button type="submit" class="btn btn-newsletter">Subscribe</button>
                </form>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="footer-bottom-container">
                <p>&copy; <?php echo date('Y'); ?> <?php echo SITE_NAME; ?>. All rights reserved.</p>
                <div class="payment-methods">
                    <span>We accept:</span>
                    <span class="payment-icon">💳</span>
                    <span class="payment-icon">📱</span>
                    <span class="payment-icon">🔒</span>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>