<?php
include '../database/database.php';
include '../layout/header.php';

$stmt = $conn->prepare("SELECT * FROM Books");
$stmt->execute();
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Book List</h2>
<a href="addbook.php">Add New Book</a>
<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>Publisher</th>
        <th>Year</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($books as $book): ?>
    <tr>
        <td><?php echo $book['book_id']; ?></td>
        <td><?php echo $book['title']; ?></td>
        <td><?php echo $book['author']; ?></td>
        <td><?php echo $book['publisher']; ?></td>
        <td><?php echo $book['publish_year']; ?></td>
        <td>
            <a href="editbook.php?id=<?php echo $book['book_id']; ?>">Edit</a>
            <a href="deletebook.php?id=<?php echo $book['book_id']; ?>">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php include '../layout/footer.php'; ?>