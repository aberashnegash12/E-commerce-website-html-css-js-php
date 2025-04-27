<?php
header('Content-Type: application/json');
session_start();
require_once '../config.php';

$response = ['success' => false];

try {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Get cart items
        $cart = $_SESSION['cart'] ?? [];
        $response = ['success' => true, 'data' => $cart];
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Add to cart
        $data = json_decode(file_get_contents('php://input'), true);
        
        if (!isset($data['product_id']) || !isset($data['quantity'])) {
            throw new Exception('Missing product ID or quantity');
        }
        
        $productId = (int)$data['product_id'];
        $quantity = (int)$data['quantity'];
        
        // Get product details
        $stmt = $pdo->prepare('SELECT id, title, price FROM products WHERE id = ?');
        $stmt->execute([$productId]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$product) {
            throw new Exception('Product not found');
        }
        
        // Initialize cart if not exists
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        
        // Check if product already in cart
        $found = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] === $productId) {
                $item['quantity'] += $quantity;
                $found = true;
                break;
            }
        }
        
        // If not found, add new item
        if (!$found) {
            $_SESSION['cart'][] = [
                'id' => $productId,
                'title' => $product['title'],
                'price' => $product['price'],
                'quantity' => $quantity,
                'image_url' => $product['image_url'] ?? ''
            ];
        }
        
        $response = ['success' => true, 'message' => 'Product added to cart'];
    } elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        // Remove from cart
        $data = json_decode(file_get_contents('php://input'), true);
        
        if (!isset($data['product_id'])) {
            throw new Exception('Missing product ID');
        }
        
        $productId = (int)$data['product_id'];
        
        if (isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array_filter($_SESSION['cart'], function($item) use ($productId) {
                return $item['id'] !== $productId;
            });
        }
        
        $response = ['success' => true, 'message' => 'Product removed from cart'];
    }
} catch (Exception $e) {
    $response['message'] = $e->getMessage();
}

echo json_encode($response);
?>