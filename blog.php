<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - NetFusionIT</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container mt-5">
        <h1>Blog</h1>
        <?php
        include 'db.php';
        $result = $conn->query("SELECT * FROM blog_posts ORDER BY created_at DESC");
        while ($row = $result->fetch_assoc()) {
            echo "<div class='blog-post'>";
            echo "<h2>" . $row['title'] . "</h2>";
            echo "<p>" . $row['content'] . "</p>";
            echo "<small>Erstellt am: " . $row['created_at'] . "</small>";
            echo "</div>";
        }
        ?>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
