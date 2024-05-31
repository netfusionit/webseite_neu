<?php
include 'db.php';

$content = $_POST['content'];

$sql = "INSERT INTO ticker_messages (content) VALUES ('$content')";

if ($conn->query($sql) === TRUE) {
    echo "New ticker message created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: admin.php");
?>
