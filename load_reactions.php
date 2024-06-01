<?php
include 'db.php';

$blog_id = intval($_GET['blog_id']);

$result = $conn->query("SELECT like_count, love_count, wow_count, sad_count FROM article_reactions WHERE blog_id = $blog_id");
$data = $result->fetch_assoc();

echo json_encode($data);
?>
