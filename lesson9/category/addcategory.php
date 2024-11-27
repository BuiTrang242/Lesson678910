<?php
include '../database/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    if (!empty($name)) {
        $stmt = $conn->prepare("INSERT INTO Categories (name) VALUES (:name)");
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        header("Location: displaycategory.php");
    } else {
        echo "Category name cannot be empty.";
    }
}
?>
<form method="post" action="addcategory.php">
    <label for="name">Category Name:</label>
    <input type="text" id="name" name="name" required>
    <button type="submit">Add Category</button>
</form>