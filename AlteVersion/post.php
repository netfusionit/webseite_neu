<?php include 'includes/header.php'; ?>

<section class="my-5">
    <div class="container">
        <?php
        include 'includes/db.php';
        $id = $conn->real_escape_string($_GET['id']);
        $sql = "SELECT * FROM blog_posts WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<h2>" . $row['title'] . "</h2>";
            echo "<p>" . $row['content'] . "</p>";
        } else {
            echo "<p>Beitrag nicht gefunden.</p>";
        }

        $conn->close();
        ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
