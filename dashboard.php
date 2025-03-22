<?php
include 'includes/auth.php';
redirectToLogin();

include 'includes/db_connect.php';

$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo $_SESSION['name']; ?>!</h2>
        <p>Your role: <?php echo $role; ?></p>

        <?php if ($role === 'Admin'): ?>
            <a href="donors.php">Manage Donors</a><br>
            <a href="beneficiaries.php">Manage Beneficiaries</a><br>
            <a href="projects.php">Manage Projects</a><br>
            <a href="accounting.php">Accounting</a><br>
        <?php elseif ($role === 'Donor'): ?>
            <a href="donations.php">View Your Donations</a><br>
        <?php elseif ($role === 'Beneficiary'): ?>
            <a href="profile.php">Update Your Profile</a><br>
        <?php endif; ?>

        <a href="logout.php">Logout</a>
    </div>
</body>
</html>