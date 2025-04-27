<?php
header('Content-Type: application/json');
require_once '../config.php';

try {
    $stmt = $pdo->query('SELECT * FROM products');
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode(['success' => true, 'data' => $products]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>