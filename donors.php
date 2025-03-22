<?php
include 'includes/auth.php';
redirectToLogin();
if (!isAdmin()) {
    header("Location: dashboard.php");
    exit();
}

include 'includes/db_connect.php';

$sql = "SELECT * FROM Donors";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Donors</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Donors List</h2>
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['Name']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                    <td><?php echo $row['Phone']; ?></td>
                    <td><a href="edit_donor.php?id=<?php echo $row['DonorID']; ?>">Edit</a></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>