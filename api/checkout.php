<?php
header('Content-Type: application/json');
session_start();
require_once '../config.php';

$response = ['success' => false];

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Invalid request method');
    }
    
    // Check if user is logged in
    if (!isset($_SESSION['user'])) {
        throw new Exception('You must be logged in to checkout');
    }
    
    $userId = $_SESSION['user']['id'];
    
    // Check if cart is not empty
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        throw new Exception('Your cart is empty');
    }
    
    // Calculate total
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    
    // Start transaction
    $pdo->beginTransaction();
    
    try {
        // Create order
        $stmt = $pdo->prepare('INSERT INTO orders (user_id, total) VALUES (?, ?)');
        $stmt->execute([$userId, $total]);
        $orderId = $pdo->lastInsertId();
        
        // Add order items
        $stmt = $pdo->prepare('INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)');
        
        foreach ($_SESSION['cart'] as $item) {
            $stmt->execute([$orderId, $item['id'], $item['quantity'], $item['price']]);
            
            // Update product stock (optional)
            // $updateStmt = $pdo->prepare('UPDATE products SET stock = stock - ? WHERE id = ?');
            // $updateStmt->execute([$item['quantity'], $item['id']]);
        }
        
        // Clear cart
        unset($_SESSION['cart']);
        
        $pdo->commit();
        
        $response = ['success' => true, 'message' => 'Order placed successfully', 'order_id' => $orderId];
    } catch (Exception $e) {
        $pdo->rollBack();
        throw $e;
    }
} catch (Exception $e) {
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
?>