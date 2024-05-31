<?php
include 'db.php';

$blog_id = $_POST['blog_id'];
$author = $_POST['author'];
$comment = $_POST['comment'];

$stmt = $conn->prepare("INSERT INTO comments (blog_id, author, comment) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $blog_id, $author, $comment);
$stmt->execute();

header("Location: blog-details.php?id=$blog_id");
?>
