<?php
include 'db.php';

$comment_id = intval($_GET['comment_id']);

$result = $conn->query("SELECT like_count, dislike_count FROM comment_reactions WHERE comment_id = $comment_id");
$data = $result->fetch_assoc();

echo json_encode($data);
?>
