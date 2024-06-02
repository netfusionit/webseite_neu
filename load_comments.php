<?php
include 'db.php';

$blog_id = intval($_GET['blog_id']);
$page = intval($_GET['page']);
$limit = 3;
$start = ($page - 1) * $limit;

$comment_result = $conn->query("SELECT * FROM comments WHERE blog_id = $blog_id ORDER BY created_at DESC LIMIT $start, $limit");
while ($comment = $comment_result->fetch_assoc()) {
    $comment_id = $comment['id'];
    $reactions_result = $conn->query("SELECT like_count, dislike_count FROM comment_reactions WHERE comment_id = $comment_id");
    $reactions = $reactions_result->fetch_assoc();
    
    echo "<div class='comment-box'>";
    echo "<h5>" . $comment['author'] . "</h5>";
    echo "<small>Kommentiert am: " . date('d.m.Y H:i', strtotime($comment['created_at'])) . "</small>";
    echo "<p>" . $comment['comment'] . "</p>";
    echo "<div class='comment-reaction' id='comment-reaction-$comment_id'>";
    echo "<span class='bi bi-hand-thumbs-up' data-reaction='like' data-comment-id='$comment_id'></span>";
    echo "<span class='count'>" . $reactions['like_count'] . "</span>";
    echo "<span class='bi bi-hand-thumbs-down' data-reaction='dislike' data-comment-id='$comment_id'></span>";
    echo "<span class='count'>" . $reactions['dislike_count'] . "</span>";
    echo "</div>";
    echo "</div>";
}
?>
