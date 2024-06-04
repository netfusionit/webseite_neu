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
            border: 2px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            background-color: #ffffff;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .search-results .result-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .search-results .result-item h3 {
            margin-bottom: 10px;
            color: #0056b3;
            font-size: 1.25rem;
        }

        .search-results .result-item p {
            margin-bottom: 10px;
            font-size: 1.1rem;
            line-height: 1.5;
        }

        .search-results .result-item a.btn {
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
        }

        .search-results .result-item a.btn:hover {
            background-color: #0056b3;
        }

        .too-many-results {
            color: red;
            font-weight: bold;
            margin-top: 20px;
        }

        mark {
            background-color: #ffff00; /* Neon gelb */
            color: black;
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
        <h1>Suchergebnisse für "<span style="color: #007bff;"><?php echo htmlspecialchars($_GET['query']); ?></span>"</h1>
        <div class="search-results" id="searchResults">
            <?php
            include 'db.php';
            $query = $_GET['query'];
            $search = "%$query%";

            // Suche in Blog-Beiträgen
            echo "<h2>Beiträge und Meldungen</h2>";
            $stmt = $conn->prepare("SELECT id, title, content FROM blog_posts WHERE title LIKE ? OR content LIKE ?");
            $stmt->bind_param("ss", $search, $search);
            $stmt->execute();
            $result = $stmt->get_result();

            $numResults = $result->num_rows;
            if ($numResults > 5) {
                echo "<p class='too-many-results'>Zu viele Ergebnisse, bitte präzisieren Sie Ihre Anfrage.</p>";
            } else {
                if ($numResults > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='result-item'>";
                        echo "<h3>" . $row['title'] . "</h3>";
                        $cleanContent = strip_tags($row['content']);
                        $highlightedContent = str_ireplace($query, "<mark>$query</mark>", $cleanContent);
                        echo "<p>" . substr($highlightedContent, 0, 300) . "...</p>";
                        echo "<a href='blog-details.php?id=" . $row['id'] . "' class='btn btn-primary mt-2'>Weiterlesen</a>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Keine Beiträge oder Meldungen gefunden.</p>";
                }
            }
            $stmt->close();

            // Ergebnisse von get_indexsuche.php abrufen
            $indexResults = file_get_contents("https://netfusionit.de/get_indexsuche.php?query=" . urlencode($query));
            $indexResults = json_decode($indexResults, true);

            if (!empty($indexResults)) {
                echo "<h2>Hauptseite</h2>";
                foreach ($indexResults as $result) {
                    echo "<div class='result-item'>";
                    echo "<h3>Gefunden auf der Hauptseite</h3>";
                    echo "<p>" . $result['line'] . "...</p>";
                    echo "<a href='/index.php?query=" . urlencode($query) . "#line-" . $result['line_number'] . "' class='btn btn-primary mt-2'>Zum Seiteninhalt springen</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>Keine relevanten Inhalte auf der Hauptseite gefunden.</p>";
            }

            $conn->close();
        ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
