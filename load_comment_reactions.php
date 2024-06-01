<?php
include 'db.php';

$comment_id = intval($_GET['comment_id']);

$reactions = ['like', 'dislike'];
$data = [];

foreach ($reactions as $reaction) {
    $result = $conn->query("SELECT COUNT(*) as count FROM comment_reactions WHERE comment_id = $comment_id AND reaction_type = '$reaction'");
    $data[$reaction] = $result->fetch_assoc()['count'];
}

echo json_encode($data);
?>
