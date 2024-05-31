<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $blog_id = intval($_POST['blog_id']);
    $reaction_type = $conn->real_escape_string($_POST['reaction_type']);

    $sql = "INSERT INTO reactions (blog_id, reaction_type) VALUES ($blog_id, '$reaction_type')";
    if ($conn->query($sql) === TRUE) {
        echo "Reaktion gespeichert";
    } else {
        echo "Fehler: " . $sql . "<br>" . $conn->error;
    }
}
?>
