<?php
include '../database/database.php';
include '../layout/header.php';

$stmt = $conn->prepare("SELECT * FROM borrow_return");
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Borrow Order List</h2>
<a href="addborroworder.php">Add New Borrow Order</a>
<table>
    <tr>
        <th>Transaction ID</th>
        <th>Student ID</th>
        <th>Book ID</th>
        <th>Borrow Date</th>
        <th>Due Date</th>
        <th>Return Date</th>
        <th>Fine</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($orders as $order): ?>
    <tr>
        <td><?php echo $order['transaction_id']; ?></td>
        <td><?php echo $order['student_id']; ?></td>
        <td><?php echo $order['book_id']; ?></td>
        <td><?php echo $order['borrow_date']; ?></td>
        <td><?php echo $order['due_date']; ?></td>
        <td><?php echo $order['return_date']; ?></td>
        <td><?php echo $order['fine']; ?></td>
        <td>
            <a href="editborroworder.php?id=<?php echo $order['transaction_id']; ?>">Edit</a>
            <a href="deleteborroworder.php?id=<?php echo $order['transaction_id']; ?>">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php include '../layout/footer.php'; ?>