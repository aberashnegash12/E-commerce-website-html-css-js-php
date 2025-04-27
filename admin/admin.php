<?php
session_start();
require_once 'config.php';

// Check if admin is logged in
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit;
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_product'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $stock = $_POST['stock'];
        
        // Handle image upload
        $imageUrl = '';
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/';
            $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
            $targetPath = $uploadDir . $fileName;
            
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                $imageUrl = $targetPath;
            }
        }
        
        $stmt = $pdo->prepare('INSERT INTO products (title, description, price, category, image_url, stock) VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->execute([$title, $description, $price, $category, $imageUrl, $stock]);
        
        $message = 'Product added successfully';
    } elseif (isset($_POST['update_product'])) {
        // Similar to add but with UPDATE query
    } elseif (isset($_POST['delete_product'])) {
        $id = $_POST['id'];
        $stmt = $pdo->prepare('DELETE FROM products WHERE id = ?');
        $stmt->execute([$id]);
        $message = 'Product deleted successfully';
    }
}

// Get all products
$products = $pdo->query('SELECT * FROM products')->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="admin-container">
        <h1>Admin Panel</h1>
        
        <?php if (isset($message)): ?>
            <div class="alert"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>
        
        <h2>Add New Product</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Product Title" required>
            <textarea name="description" placeholder="Description"></textarea>
            <input type="number" name="price" step="0.01" placeholder="Price" required>
            <select name="category" required>
                <option value="electronics">Electronics</option>
                <option value="clothing">Clothing</option>
                <option value="home">Home</option>
            </select>
            <input type="number" name="stock" placeholder="Stock Quantity" required>
            <input type="file" name="image" accept="image/*">
            <button type="submit" name="add_product">Add Product</button>
        </form>
        
        <h2>Product List</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product['id'] ?></td>
                    <td><img src="<?= $product['image_url'] ?>" alt="<?= $product['title'] ?>" width="50"></td>
                    <td><?= htmlspecialchars($product['title']) ?></td>
                    <td>$<?= number_format($product['price'], 2) ?></td>
                    <td><?= ucfirst($product['category']) ?></td>
                    <td><?= $product['stock'] ?></td>
                    <td>
                        <a href="edit_product.php?id=<?= $product['id'] ?>">Edit</a>
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $product['id'] ?>">
                            <button type="submit" name="delete_product">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>