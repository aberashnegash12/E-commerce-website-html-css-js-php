<?php
header('Content-Type: application/json');
session_start();
require_once '../config.php';

$response = ['success' => false];

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $action = $_POST['action'] ?? '';
        
        if ($action === 'register') {
            // Registration
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            
            // Validate inputs
            if (empty($username) || empty($email) || empty($password)) {
                throw new Exception('All fields are required');
            }
            
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception('Invalid email format');
            }
            
            if (strlen($password) < 6) {
                throw new Exception('Password must be at least 6 characters');
            }
            
            // Check if username or email exists
            $stmt = $pdo->prepare('SELECT id FROM users WHERE username = ? OR email = ?');
            $stmt->execute([$username, $email]);
            
            if ($stmt->rowCount() > 0) {
                throw new Exception('Username or email already exists');
            }
            
            // Hash password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            
            // Insert new user
            $stmt = $pdo->prepare('INSERT INTO users (username, email, password) VALUES (?, ?, ?)');
            $stmt->execute([$username, $email, $hashedPassword]);
            
            $response = ['success' => true, 'message' => 'Registration successful'];
        } elseif ($action === 'login') {
            // Login
            $username = trim($_POST['username']);
            $password = $_POST['password'];
            
            // Find user
            $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
            $stmt->execute([$username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$user || !password_verify($password, $user['password'])) {
                throw new Exception('Invalid username or password');
            }
            
            // Set session
            $_SESSION['user'] = [
                'id' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email']
            ];
            
            $response = ['success' => true, 'message' => 'Login successful'];
        }
    } elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'logout') {
        // Logout
        session_destroy();
        $response = ['success' => true, 'message' => 'Logged out successfully'];
    }
} catch (Exception $e) {
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
?>