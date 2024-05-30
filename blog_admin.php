<?php include 'includes/header.php'; ?>

<section class="my-5">
    <div class="container">
        <h2>Blog Verwaltung</h2>
        <form action="blog_admin.php" method="post" class="blog-form">
            <div class="form-group">
                <label for="title">Titel:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="content">Inhalt:</label>
                <textarea id="content" name="content" rows="10" required></textarea>
            </div>
            <button type="submit">Erstellen</button>
        </form>

        <h3>Vorhandene Beiträge</h3>
        <?php
        include 'includes/db.php';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = $conn->real_escape_string($_POST['title']);
            $content = $conn->real_escape_string($_POST['content']);

            $sql = "INSERT INTO blog_posts (title, content) VALUES ('$title', '$content')";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Beitrag erfolgreich erstellt');</script>";
            } else {
                echo "<script>alert('Fehler beim Erstellen des Beitrags');</script>";
            }
        }

        $sql = "SELECT * FROM blog_posts ORDER BY created_at DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<ul>";
            while($row = $result->fetch_assoc()) {
                echo "<li>" . $row['title'] . " - <a href='blog_admin.php?delete=" . $row['id'] . "'>Löschen</a></li>";
            }
            echo "</ul>";
        } else {
            echo "<p>Noch keine Blogeinträge vorhanden.</p>";
        }

        if (isset($_GET['delete'])) {
            $id = $conn->real_escape_string($_GET['delete']);
            $sql = "DELETE FROM blog_posts WHERE id = $id";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Beitrag erfolgreich gelöscht');</script>";
                echo "<script>window.location.href='blog_admin.php';</script>";
            } else {
                echo "<script>alert('Fehler beim Löschen des Beitrags');</script>";
            }
        }

        $conn->close();
        ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
