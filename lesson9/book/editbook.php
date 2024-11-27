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
    $stmt = $conn->prepare("SELECT * FROM Books WHERE book_id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $book = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $year = $_POST['year'];

    $stmt = $conn->prepare("UPDATE Books SET title = :title, author = :author, publisher = :publisher, publish_year = :year WHERE book_id = :id");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':publisher', $publisher);
    $stmt->bindParam(':year', $year);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    header("Location: displaybook.php");
}
?>

<form method="post" action="editbook.php?id=<?php echo $id; ?>">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="<?php echo $book['title']; ?>" required>
    <label for="author">Author:</label>
    <input type="text" id="author" name="author" value="<?php echo $book['author']; ?>" required>
    <label for="publisher">Publisher:</label>
    <input type="text" id="publisher" name="publisher" value="<?php echo $book['publisher']; ?>">
    <label for="year">Year:</label>
    <input type="number" id="year" name="year" value="<?php echo $book['publish_year']; ?>">
    <button type="submit">Update Book</button>
</form>