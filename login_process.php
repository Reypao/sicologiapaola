<?php
session_start();

// Example credentials (you should replace with a database check)
$valid_user = 'caiso';
$valid_password = 'paola1'; // In production, store and compare hashed passwords!

// Get form data
$user = $_POST['user'] ?? '';
$password = $_POST['password'] ?? '';

// Validate credentials
if ($user === $valid_user && $password === $valid_password) {
    // Successful login
    $_SESSION['caiso'] = true;
    header("Location: administracion.php"); // Redirect to a protected page
    exit();
} else {
    // Failed login
    header("Location: login.php?error=1"); // Redirect back with error
    exit();
}
