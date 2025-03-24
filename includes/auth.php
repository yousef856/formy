<?php
session_start();

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function isAdmin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'Admin';
}

function redirectToLogin() {
    if (!isLoggedIn()) {
        header("Location: login.php");
        exit();
    }
}
?>