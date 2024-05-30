<?php include 'includes/header.php'; ?>

<section class="my-5">
    <div class="container">
        <h2>Blog</h2>
        <?php
        include 'includes/db.php';
        $sql = "SELECT * FROM blog_posts ORDER BY created_at DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='blog-post'>";
                echo "<h3>" . $row['title'] . "</h3>";
                echo "<p>" . substr($row['content'], 0, 200) . "...</p>";
                echo "<a href='post.php?id=" . $row['id'] . "'>Weiterlesen</a>";
                echo "</div>";
            }
        } else {
            echo "<p>Noch keine Blogeinträge vorhanden.</p>";
        }

        $conn->close();
        ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
