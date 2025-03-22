<?php
include 'includes/auth.php';
redirectToLogin();
if (!isAdmin()) {
    header("Location: dashboard.php");
    exit();
}

include 'includes/db_connect.php';

$sql = "SELECT * FROM JournalEntries";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accounting</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Journal Entries</h2>
        <table border="1">
            <tr>
                <th>Date</th>
                <th>Description</th>
                <th>Debit</th>
                <th>Credit</th>
                <th>Amount</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['Date']; ?></td>
                    <td><?php echo $row['Description']; ?></td>
                    <td><?php echo $row['DebitAccountID']; ?></td>
                    <td><?php echo $row['CreditAccountID']; ?></td>
                    <td><?php echo $row['Amount']; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>