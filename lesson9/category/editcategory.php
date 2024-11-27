<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
include '../database/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM Categories WHERE category_id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $category = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $stmt = $conn->prepare("UPDATE Categories SET name = :name WHERE category_id = :id");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    header("Location: displaycategory.php");
}
?>
<form method="post" action="editcategory.php?id=<?php echo $id; ?>">
    <label for="name">Category Name:</label>
    <input type="text" id="name" name="name" value="<?php echo $category['name']; ?>" required>
    <button type="submit">Update Category</button>
</form>