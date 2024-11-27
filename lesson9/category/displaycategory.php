<?php
include '../database/database.php';
include '../layout/header.php';

$stmt = $conn->prepare("SELECT * FROM Categories");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Category List</h2>
<a href="addcategory.php">Add New Category</a>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($categories as $category): ?>
    <tr>
        <td><?php echo $category['category_id']; ?></td>
        <td><?php echo $category['name']; ?></td>
        <td>
            <a href="editcategory.php?id=<?php echo $category['category_id']; ?>">Edit</a>
            <a href="deletecategory.php?id=<?php echo $category['category_id']; ?>">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php include '../layout/footer.php'; ?>