<?php
include 'db.php';

$title = $_POST['title'];
$content = $_POST['content'];
$author = $_POST['author'];
$tags = $_POST['tags'];
$category = $_POST['category'];
$image = '';

if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $target_dir = "assets/img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $image = basename($_FILES["image"]["name"]);
    }
}

$stmt = $conn->prepare("INSERT INTO blog_posts (title, content, author, tags, category, image) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $title, $content, $author, $tags, $category, $image);
$stmt->execute();

header('Location: admin.php');
?>
