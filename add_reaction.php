<?php
include 'db.php';

$blog_id = isset($_POST['blog_id']) ? intval($_POST['blog_id']) : null;
$reaction_type = $_POST['reaction_type'];
$comment_id = isset($_POST['comment_id']) ? intval($_POST['comment_id']) : null;

if ($comment_id) {
    // Reaktionen für Kommentare
    $sql = "INSERT INTO comment_reactions (comment_id, reaction_type) VALUES ('$comment_id', '$reaction_type')";
    if ($conn->query($sql) === TRUE) {
        echo "Reaktion gespeichert";
    } else {
        echo "Fehler: " . $sql . "<br>" . $conn->error;
    }
} else if ($blog_id) {
    // Reaktionen für Blog-Posts
    $sql = "INSERT INTO reactions (blog_id, reaction_type) VALUES ('$blog_id', '$reaction_type')";
    if ($conn->query($sql) === TRUE) {
        echo "Reaktion gespeichert";
    } else {
        echo "Fehler: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
