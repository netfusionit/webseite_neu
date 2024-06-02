<?php
include 'db.php';

$title = $_POST['title'];
$active_since = $_POST['active_since'];
$category = $_POST['category'];
$description = $_POST['description'];

$sql = "INSERT INTO changelog (title, active_since, category, description) VALUES ('$title', '$active_since', '$category', '$description')";
if ($conn->query($sql) === TRUE) {
    echo "Neue Änderung erfolgreich hinzugefügt.";
} else {
    echo "Fehler: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: admin.php");
?>
