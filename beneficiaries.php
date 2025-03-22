<?php
include 'includes/auth.php';
redirectToLogin();
if (!isAdmin()) {
    header("Location: dashboard.php");
    exit();
}

include 'includes/db_connect.php';

$sql = "SELECT * FROM Beneficiaries";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Beneficiaries</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Beneficiaries List</h2>
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Disability Type</th>
                <th>Needs</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['Name']; ?></td>
                    <td><?php echo $row['Age']; ?></td>
                    <td><?php echo $row['DisabilityType']; ?></td>
                    <td><?php echo $row['Needs']; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>