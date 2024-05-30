<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suche - NetFusionIT</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container mt-5">
        <h1>Suchergebnisse</h1>
        <?php
        include 'db.php';
        $query = $_GET['query'];
        $stmt = $conn->prepare("SELECT * FROM blog_posts WHERE title LIKE ? OR content LIKE ?");
        $search = "%$query%";
        $stmt->bind_param("ss", $search, $search);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='blog-post'>";
                echo "<h2>" . $row['title'] . "</h2>";
                echo "<p>" . $row['content'] . "</p>";
                echo "<small>Erstellt am: " . $row['created_at'] . "</small>";
                echo "</div>";
            }
        } else {
            echo "Keine Ergebnisse gefunden.";
        }
        $stmt->close();
        $conn->close();
        ?>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
