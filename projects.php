<?php
include 'includes/auth.php';
redirectToLogin();
if (!isAdmin()) {
    header("Location: dashboard.php");
    exit();
}

include 'includes/db_connect.php';

$sql = "SELECT * FROM Projects";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Projects</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Projects List</h2>
        <table border="1">
            <tr>
                <th>Title</th>
                <th>Budget</th>
                <th>Status</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['Title']; ?></td>
                    <td><?php echo $row['Budget']; ?></td>
                    <td><?php echo $row['Status']; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>