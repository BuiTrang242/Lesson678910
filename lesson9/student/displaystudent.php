<?php
include '../database/database.php';
include '../layout/header.php';

$stmt = $conn->prepare("SELECT * FROM Students");
$stmt->execute();
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Student List</h2>
<a href="addstudent.php">Add New Student</a>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($students as $student): ?>
    <tr>
        <td><?php echo $student['student_id']; ?></td>
        <td><?php echo $student['name']; ?></td>
        <td><?php echo $student['email']; ?></td>
        <td><?php echo $student['phone']; ?></td>
        <td>
            <a href="editstudent.php?id=<?php echo $student['student_id']; ?>">Edit</a>
            <a href="deletestudent.php?id=<?php echo $student['student_id']; ?>">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php include '../layout/footer.php'; ?>