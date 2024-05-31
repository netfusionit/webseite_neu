<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM blog_posts WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
header("Location: admin.php");
?>
