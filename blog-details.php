<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Details - NetFusionIT</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container mt-5">
        <?php
        include 'db.php';
        $id = $_GET['id'];
        $result = $conn->query("SELECT * FROM blog_posts WHERE id = $id");
        $row = $result->fetch_assoc();
        ?>
        <h1><?php echo $row['title']; ?></h1>
        <img src="assets/img/<?php echo $row['image']; ?>" class="img-fluid" alt="">
        <p><small>By <?php echo $row['author']; ?> on <?php echo $row['created_at']; ?></small></p>
        <p><?php echo nl2br($row['content']); ?></p>
        <h3>Kommentare</h3>
        <div id="comments">
            <?php
            $comments = $conn->query("SELECT * FROM comments WHERE blog_id = $id ORDER BY created_at DESC");
            while ($comment = $comments->fetch_assoc()) {
                echo "<div class='comment'>";
                echo "<p>" . $comment['comment'] . "</p>";
                echo "<p><small>By " . $comment['author'] . " on " . $comment['created_at'] . "</small></p>";
                echo "</div>";
            }
            ?>
        </div>
        <h3>Kommentar hinzufügen</h3>
        <form action="add_comment.php" method="post">
            <input type="hidden" name="blog_id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="author">Name</label>
                <input type="text" class="form-control" id="author" name="author" required>
            </div>
            <div class="form-group">
                <label for="comment">Kommentar</label>
                <textarea class="form-control" id="comment" name="comment" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kommentar hinzufügen</button>
        </form>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
