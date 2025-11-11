<?php include 'includes/header.php'; 

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);
    
    $errors = [];
    
    // Validation
    if(empty($name)) {
        $errors[] = "Name is required";
    }
    
    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required";
    }
    
    if(empty($subject)) {
        $errors[] = "Subject is required";
    }
    
    if(empty($message) || strlen($message) < 10) {
        $errors[] = "Message must be at least 10 characters";
    }
    
    if(empty($errors)) {
        // Here you would typically:
        // 1. Save to database
        // 2. Send email notification
        // 3. Process the contact form
        
        // For demonstration, we'll just show success message
        $_SESSION['success'] = "Thank you for your message! We'll get back to you within 24 hours.";
        header('Location: contact.php');
        exit;
    }
}
?>

<div class="container">
    <div class="page-header">
        <h1>Contact Us</h1>
        <p class="lead">Get in touch with our team</p>
    </div>

    <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <p><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></p>
        </div>
    <?php endif; ?>

    <div class="contact-container">
        <div class="contact-form">
            <h2>Send us a Message</h2>
            
            <?php if(!empty($errors)): ?>
                <div class="alert alert-error">
                    <?php foreach($errors as $error): ?>
                        <p><?php echo $error; ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            
            <form action="contact.php" method="POST">
                <div class="form-group">
                    <label for="name">Your Name:</label>
                    <input type="text" id="name" name="name" class="form-control" 
                           value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Your Email:</label>
                    <input type="email" id="email" name="email" class="form-control" 
                           value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" id="subject" name="subject" class="form-control" 
                           value="<?php echo isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : ''; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" class="form-control" rows="6" required><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>
        
        <div class="contact-info">
            <h2>Get in Touch</h2>
            <div class="contact-details">
                <div class="contact-item">
                    <h3>📍 Address</h3>
                    <p>123 Commerce Street<br>Business City, BC 12345<br>United States</p>
                </div>
                
                <div class="contact-item">
                    <h3>📞 Phone</h3>
                    <p>+1 (555) 123-4567<br>Mon-Fri: 9:00 AM - 6:00 PM EST</p>
                </div>
                
                <div class="contact-item">
                    <h3>📧 Email</h3>
                    <p>support@<?php echo strtolower(SITE_NAME); ?>.com<br>sales@<?php echo strtolower(SITE_NAME); ?>.com</p>
                </div>
                
                <div class="contact-item">
                    <h3>🕒 Business Hours</h3>
                    <p>Monday - Friday: 9:00 AM - 6:00 PM<br>Saturday: 10:00 AM - 4:00 PM<br>Sunday: Closed</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>