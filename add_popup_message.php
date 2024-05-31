<?php
include 'db.php';

$title = $_POST['title'];
$content = $_POST['content'];

$sql = "INSERT INTO popup_messages (title, content) VALUES ('$title', '$content')";

if ($conn->query($sql) === TRUE) {
    echo "New popup message created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: admin.php");
?>
