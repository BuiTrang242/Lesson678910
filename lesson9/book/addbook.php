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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $year = $_POST['year'];

    if (!empty($title) && !empty($author)) {
        $stmt = $conn->prepare("INSERT INTO Books (title, author, publisher, publish_year) VALUES (:title, :author, :publisher, :year)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':publisher', $publisher);
        $stmt->bindParam(':year', $year);
        $stmt->execute();
        header("Location: displaybook.php");
    } else {
        echo "Title and Author cannot be empty.";
    }
}
?>

<form method="post" action="addbook.php">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required>
    <label for="author">Author:</label>
    <input type="text" id="author" name="author" required>
    <label for="publisher">Publisher:</label>
    <input type="text" id="publisher" name="publisher">
    <label for="year">Year:</label>
    <input type="number" id="year" name="year">
    <button type="submit">Add Book</button>
</form>