<?php
include 'db.php';

$blog_id = intval($_GET['blog_id']);

$reactions = ['like', 'love', 'wow', 'sad'];
$data = [];

foreach ($reactions as $reaction) {
    $result = $conn->query("SELECT COUNT(*) as count FROM reactions WHERE blog_id = $blog_id AND reaction_type = '$reaction'");
    $data[$reaction] = $result->fetch_assoc()['count'];
}

echo json_encode($data);
?>
