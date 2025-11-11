<?php include 'includes/header.php'; 

// Redirect if already logged in
if(isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    
    $errors = [];
    
    // Validation
    if(empty($email) || empty($password)) {
        $errors[] = "Please enter both email and password";
    }
    
    if(empty($errors)) {
        // Check user credentials
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($user && password_verify($password, $user['password'])) {
            // Login successful
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            
            $_SESSION['success'] = "Welcome back, " . $user['name'] . "!";
            header('Location: index.php');
            exit;
        } else {
            $errors[] = "Invalid email or password";
        }
    }
}
?>

<div class="container">
    <div class="auth-form">
        <h2>Login to Your Account</h2>
        
        <?php if(!empty($errors)): ?>
            <div class="alert alert-error">
                <?php foreach($errors as $error): ?>
                    <p><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        
        <?php if(isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <p><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></p>
            </div>
        <?php endif; ?>
        
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" 
                       value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        
        <p class="auth-link">
            Don't have an account? <a href="register.php">Register here</a>
        </p>
    </div>
</div>

<?php include 'includes/footer.php'; ?>