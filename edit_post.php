<?php
include 'db.php';

$id = $_POST['id'];
$title = $_POST['title'];
$content = $_POST['content'];
$author = $_POST['author'];
$tags = $_POST['tags'];
$category = $_POST['category'];
$image = '';

if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
    $image = basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $image);
    $sql = "UPDATE blog_posts SET title='$title', content='$content', author='$author', tags='$tags', category='$category', image='$image' WHERE id=$id";
} else {
    $sql = "UPDATE blog_posts SET title='$title', content='$content', author='$author', tags='$tags', category='$category' WHERE id=$id";
}

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
header("Location: admin.php");
?>
