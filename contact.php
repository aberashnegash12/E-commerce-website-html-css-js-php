<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - ShopEasy</title>
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
                <a href="about.php">About</a>
                <a href="contact.php" class="active">Contact</a>
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

    <!-- Contact Hero Section -->
    <section class="contact-hero">
        <div class="contact-hero-content">
            <h1>Get In Touch</h1>
            <p>We'd love to hear from you</p>
        </div>
    </section>

    <!-- Contact Content -->
    <section class="contact-content">
        <div class="contact-container">
            <div class="contact-info">
                <h2>Contact Information</h2>
                <p>Have questions or feedback? Reach out to us through any of the channels below.</p>
                
                <div class="info-card">
                    <i class="fas fa-map-marker-alt"></i>
                    <div>
                        <h3>Address</h3>
                        <p>123 Shopping Street, E-Commerce City, EC 12345</p>
                    </div>
                </div>
                
                <div class="info-card">
                    <i class="fas fa-phone-alt"></i>
                    <div>
                        <h3>Phone</h3>
                        <p>+1 (234) 567-8900</p>
                    </div>
                </div>
                
                <div class="info-card">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <h3>Email</h3>
                        <p>info@shopeasy.com</p>
                    </div>
                </div>
                
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            
            <div class="contact-form">
                <h2>Send Us a Message</h2>
                <form id="contactForm">
                    <div class="form-group">
                        <input type="text" id="name" placeholder="Your Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" placeholder="Your Email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="subject" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <textarea id="message" rows="5" placeholder="Your Message" required></textarea>
                    </div>
                    <button type="submit" class="btn">Send Message</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.215256036409!2d-73.9878449241646!3d40.74844097138958!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a9b3117469%3A0xd134e199a405a163!2sEmpire%20State%20Building!5e0!3m2!1sen!2sus!4v1689876421561!5m2!1sen!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="faq-container">
            <h2 class="section-title">Frequently Asked Questions</h2>
            
            <div class="faq-item">
                <button class="faq-question">
                    What are your shipping options?
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>We offer standard shipping (3-5 business days) for $4.99, expedited shipping (2 business days) for $9.99, and free shipping on orders over $50. All orders are processed within 1-2 business days.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <button class="faq-question">
                    What is your return policy?
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>We accept returns within 30 days of purchase for a full refund. Items must be in original condition with tags attached. Simply contact our customer service to initiate a return.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <button class="faq-question">
                    How can I track my order?
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>Once your order ships, you'll receive a confirmation email with a tracking number. You can track your package directly through our website or the carrier's website using this number.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <button class="faq-question">
                    Do you offer international shipping?
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>Yes, we ship to over 50 countries worldwide. Shipping costs and delivery times vary by destination. Please check our international shipping page for details.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <button class="faq-question">
                    What payment methods do you accept?
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="faq-answer">
                    <p>We accept all major credit cards (Visa, MasterCard, American Express, Discover), PayPal, Apple Pay, and Google Pay. All transactions are secure and encrypted.</p>
                </div>
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
                    <li><a href="contact.php" class="active">Contact</a></li>
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
    <script>
        // FAQ functionality
        document.querySelectorAll('.faq-question').forEach(question => {
            question.addEventListener('click', () => {
                const answer = question.nextElementSibling;
                const icon = question.querySelector('i');
                
                // Toggle answer visibility
                if (answer.style.maxHeight) {
                    answer.style.maxHeight = null;
                    icon.classList.remove('fa-chevron-up');
                    icon.classList.add('fa-chevron-down');
                } else {
                    answer.style.maxHeight = answer.scrollHeight + 'px';
                    icon.classList.remove('fa-chevron-down');
                    icon.classList.add('fa-chevron-up');
                }
            });
        });

        // Contact form submission
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form values
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const subject = document.getElementById('subject').value;
            const message = document.getElementById('message').value;
            
            // Here you would typically send the data to a server
            console.log({name, email, subject, message});
            
            // Show success message
            alert('Thank you for your message! We will get back to you soon.');
            this.reset();
        });
    </script>
</body>
</html>