<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM comments WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Comment deleted successfully";
} else {
    echo "Error deleting comment: " . $conn->error;
}

$conn->close();
header("Location: admin.php");
?>
