<?php
include 'db.php';

$blog_id = $_POST['blog_id'];
$reaction_type = $_POST['reaction_type'];
$comment_id = isset($_POST['comment_id']) ? $_POST['comment_id'] : null;

if ($comment_id) {
    // Reaktionen für Kommentare
    $sql = "INSERT INTO comment_reactions (comment_id, reaction_type) VALUES ('$comment_id', '$reaction_type')";
    if ($conn->query($sql) === TRUE) {
        echo "Reaktion gespeichert";
    } else {
        echo "Fehler: " . $sql . "<br>" . $conn->error;
    }
} else {
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
