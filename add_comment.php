<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $blog_id = intval($_POST['blog_id']);
    $author = $conn->real_escape_string($_POST['author']);
    $comment = $conn->real_escape_string($_POST['comment']);

    $sql = "INSERT INTO comments (blog_id, author, comment) VALUES ($blog_id, '$author', '$comment')";
    if ($conn->query($sql) === TRUE) {
        header("Location: blog-details.php?id=$blog_id");
    } else {
        echo "Fehler: " . $sql . "<br>" . $conn->error;
    }
}
?>
