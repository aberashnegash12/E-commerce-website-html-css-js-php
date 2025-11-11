<?php
include 'includes/config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    
    // Validate email
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Here you would typically save to database
        // For now, we'll just show a success message
        $_SESSION['message'] = "Thank you for subscribing to our newsletter!";
    } else {
        $_SESSION['error'] = "Please enter a valid email address.";
    }
}

header('Location: index.php');
exit;
?>