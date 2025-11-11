<?php include 'includes/header.php'; 

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    $errors = [];
    
    // Validation
    if(empty($name)) {
        $errors[] = "Name is required";
    }
    
    if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required";
    }
    
    if(empty($password) || strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters";
    }
    
    if($password !== $confirm_password) {
        $errors[] = "Passwords do not match";
    }
    
    // Check if email already exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if($stmt->fetch()) {
        $errors[] = "Email already registered";
    }
    
    if(empty($errors)) {
        // Hash password and insert user
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        if($stmt->execute([$name, $email, $hashed_password])) {
            $_SESSION['success'] = "Registration successful! Please login.";
            header('Location: login.php');
            exit;
        } else {
            $errors[] = "Registration failed. Please try again.";
        }
    }
}
?>

<div class="container">
    <div class="auth-form">
        <h2>Create Account</h2>
        
        <?php if(!empty($errors)): ?>
            <div class="alert alert-error">
                <?php foreach($errors as $error): ?>
                    <p><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        
        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" class="form-control" 
                       value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" 
                       value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        
        <p class="auth-link">
            Already have an account? <a href="login.php">Login here</a>
        </p>
    </div>
</div>

<?php include 'includes/footer.php'; ?>