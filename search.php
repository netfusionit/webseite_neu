<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suche - NetFusionIT</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .search-results {
            margin-top: 20px;
        }

        .search-results h2 {
            margin-bottom: 20px;
            color: #007bff;
        }

        .search-results .result-item {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            background-color: #ffffff;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .search-results .result-item h3 {
            margin-bottom: 10px;
        }

        .search-results .result-item p {
            margin-bottom: 10px;
        }

        .search-results .result-item a.btn {
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
        }

        .search-results .result-item a.btn:hover {
            background-color: #0056b3;
        }

        @media (max-width: 767px) {
            .search-results .result-item {
                padding: 15px;
            }

            .search-results h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container mt-5">
        <h1>Suchergebnisse</h1>
        <div class="search-results">
            <?php
            include 'db.php';
            $query = $_GET['query'];
            $search = "%$query%";

            // Suche in Blog-Beiträgen
            echo "<h2>Beiträge und Meldungen</h2>";
            $stmt = $conn->prepare("SELECT * FROM blog_posts WHERE title LIKE ? OR content LIKE ?");
            $stmt->bind_param("ss", $search, $search);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='result-item'>";
                    echo "<h3>" . $row['title'] . "</h3>";
                    echo "<p>" . substr($row['content'], 0, 150) . "...</p>";
                    echo "<small>Erstellt am: " . date('d.m.Y', strtotime($row['created_at'])) . "</small>";
                    echo "<br><a href='blog-details.php?id=" . $row['id'] . "' class='btn btn-primary mt-2'>Weiterlesen</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>Keine Beiträge oder Meldungen gefunden.</p>";
            }
            $stmt->close();

            // Suche in Seiteninhalten
            echo "<h2>Seiteninhalte</h2>";
            $stmt = $conn->prepare("SELECT * FROM pages WHERE title LIKE ? OR content LIKE ?");
            $stmt->bind_param("ss", $search, $search);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='result-item'>";
                    echo "<h3>" . $row['title'] . "</h3>";
                    echo "<p>" . substr($row['content'], 0, 150) . "...</p>";
                    echo "<small>Erstellt am: " . date('d.m.Y', strtotime($row['created_at'])) . "</small>";
                    echo "<br><a href='page.php?id=" . $row['id'] . "' class='btn btn-primary mt-2'>Zum Seiteninhalt springen</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>Keine Seiteninhalte gefunden.</p>";
            }
            $stmt->close();

            // Suche in index.php für allgemeine Seiteninhalte
            $indexPath = realpath(dirname(__FILE__) . '/../index.php');
            if ($indexPath !== false && file_exists($indexPath)) {
                $indexContent = file_get_contents($indexPath);

                if ($indexContent !== false && stripos($indexContent, $query) !== false) {
                    echo "<div class='result-item'>";
                    echo "<h3>Startseite</h3>";
                    echo "<p>Der Suchbegriff wurde auf der Startseite gefunden.</p>";
                    echo "<br><a href='/index.php' class='btn btn-primary mt-2'>Zum Seiteninhalt springen</a>";
                    echo "</div>";
                } else {
                    echo "<p>Keine relevanten Inhalte auf der Startseite gefunden.</p>";
                }
            } else {
                echo "<p>Fehler beim Laden der Startseite.</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
