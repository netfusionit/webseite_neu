<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alle Aktuellen Meldungen im Überblick - NetFusionIT</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <style>
        .filter-form {
            margin-bottom: 20px;
        }
        .blog-post {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .blog-post h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }
        .blog-post small {
            display: block;
            margin-bottom: 10px;
            color: #6c757d;
        }
        .blog-post .badge {
            margin-right: 5px;
        }
        .blog-post img {
            width: 100%;
            height: auto;
            margin-bottom: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container mt-5">
        <h1>Alle Aktuellen Meldungen im Überblick</h1>
        
        <!-- Filterformular -->
        <form method="GET" class="filter-form">
            <div class="row">
                <div class="col-md-3">
                    <input type="text" name="search" class="form-control" placeholder="Suche nach Titel oder Inhalt" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                </div>
                <div class="col-md-2">
                    <select name="category" class="form-control">
                        <option value="">Alle Kategorien</option>
                        <?php
                        include 'db.php';
                        $conn->set_charset("utf8");
                        $categories = $conn->query("SELECT DISTINCT category FROM blog_posts ORDER BY category");
                        while ($cat = $categories->fetch_assoc()) {
                            $selected = (isset($_GET['category']) && $_GET['category'] == $cat['category']) ? 'selected' : '';
                            echo "<option value='" . $cat['category'] . "' $selected>" . $cat['category'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="date" name="date" class="form-control" value="<?php echo isset($_GET['date']) ? $_GET['date'] : ''; ?>">
                </div>
                <div class="col-md-2">
                    <select name="author" class="form-control">
                        <option value="">Alle Autoren</option>
                        <?php
                        $authors = $conn->query("SELECT DISTINCT author FROM blog_posts ORDER BY author");
                        while ($author = $authors->fetch_assoc()) {
                            $selected = (isset($_GET['author']) && $_GET['author'] == $author['author']) ? 'selected' : '';
                            echo "<option value='" . $author['author'] . "' $selected>" . $author['author'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary btn-block">Filtern</button>
                </div>
            </div>
        </form>
        
        <!-- Blog-Posts -->
        <div class="row">
            <?php
            $search = isset($_GET['search']) ? $_GET['search'] : '';
            $category = isset($_GET['category']) ? $_GET['category'] : '';
            $date = isset($_GET['date']) ? $_GET['date'] : '';
            $author = isset($_GET['author']) ? $_GET['author'] : '';

            $query = "SELECT * FROM blog_posts WHERE 1=1";

            if (!empty($search)) {
                $query .= " AND (title LIKE '%$search%' OR content LIKE '%$search%')";
            }

            if (!empty($category)) {
                $query .= " AND category = '$category'";
            }

            if (!empty($date)) {
                $query .= " AND DATE(created_at) = '$date'";
            }

            if (!empty($author)) {
                $query .= " AND author = '$author'";
            }

            // Pagination
            $limit = 15; // Anzahl der Beiträge pro Seite
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $start = ($page - 1) * $limit;
            $query .= " ORDER BY created_at DESC LIMIT $start, $limit";

            $result = $conn->query($query);

            while ($row = $result->fetch_assoc()) {
                echo "<div class='col-md-4'>";
                echo "<div class='blog-post'>";
                echo "<img src='assets/img/" . $row['image'] . "' class='img-fluid' alt=''>";
                echo "<h2><a href='blog-details.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></h2>";
                echo "<p>" . substr($row['content'], 0, 100) . "...</p>";
                echo "<small>Erstellt am: " . date('d.m.Y', strtotime($row['created_at'])) . "</small>";
                echo "<small>Autor: " . $row['author'] . "</small>";
                echo "<p><span class='badge badge-category'>" . $row['category'] . "</span></p>";
                $tags = explode(',', $row['tags']);
                foreach ($tags as $tag) {
                    echo "<span class='badge badge-tag'>" . trim($tag) . "</span>";
                }
                echo "</div>";
                echo "</div>";
            }

            // Gesamtanzahl der Beiträge für Pagination
            $result1 = $conn->query("SELECT COUNT(id) AS id FROM blog_posts");
            $total = $result1->fetch_assoc()['id'];
            $pages = ceil($total / $limit);

            $conn->close();
            ?>
        </div>
        <div class="container">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <?php for ($i = 1; $i <= $pages; $i++): ?>
                        <li class="page-item <?php if ($i == $page) echo 'active'; ?>"><a class="page-link" href="blog.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                    <?php endfor; ?>
                </ul>
            </nav>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
