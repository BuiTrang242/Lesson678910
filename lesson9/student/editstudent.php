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
    $stmt = $conn->prepare("SELECT * FROM Students WHERE student_id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $student = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $stmt = $conn->prepare("UPDATE Students SET name = :name, email = :email, phone = :phone WHERE student_id = :id");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    header("Location: displaystudent.php");
}
?>

<form method="post" action="editstudent.php?id=<?php echo $id; ?>">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo $student['name']; ?>" required>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $student['email']; ?>" required>
    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" value="<?php echo $student['phone']; ?>">
    <button type="submit">Update Student</button>
</form>