<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $conn->prepare("INSERT INTO blog_posts (title, content) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $content);

    if ($stmt->execute()) {
        echo "Beitrag erfolgreich hinzugefügt.";
    } else {
        echo "Fehler beim Hinzufügen des Beitrags: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
