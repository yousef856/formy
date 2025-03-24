<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "charity_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>