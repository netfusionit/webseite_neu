<?php
include 'db.php';

$blog_id = isset($_POST['blog_id']) ? intval($_POST['blog_id']) : null;
$reaction_type = $_POST['reaction_type'];
$comment_id = isset($_POST['comment_id']) ? intval($_POST['comment_id']) : null;

$response = ['success' => false];

if ($comment_id) {
    // Prüfen, ob bereits ein Datensatz für diesen Kommentar vorhanden ist
    $result = $conn->query("SELECT * FROM comment_reactions WHERE comment_id = $comment_id");
    if ($result->num_rows > 0) {
        // Reaktion hochzählen
        $sql = "UPDATE comment_reactions SET {$reaction_type}_count = {$reaction_type}_count + 1 WHERE comment_id = $comment_id";
    } else {
        // Neuen Datensatz erstellen
        $sql = "INSERT INTO comment_reactions (comment_id, {$reaction_type}_count) VALUES ($comment_id, 1)";
    }

    if ($conn->query($sql) === TRUE) {
        $response['success'] = true;
    }
} else if ($blog_id) {
    // Prüfen, ob bereits ein Datensatz für diesen Artikel vorhanden ist
    $result = $conn->query("SELECT * FROM article_reactions WHERE blog_id = $blog_id");
    if ($result->num_rows > 0) {
        // Reaktion hochzählen
        $sql = "UPDATE article_reactions SET {$reaction_type}_count = {$reaction_type}_count + 1 WHERE blog_id = $blog_id";
    } else {
        // Neuen Datensatz erstellen
        $sql = "INSERT INTO article_reactions (blog_id, {$reaction_type}_count) VALUES ($blog_id, 1)";
    }

    if ($conn->query($sql) === TRUE) {
        $response['success'] = true;
    }
}

echo json_encode($response);
$conn->close();
?>
