<!DOCTYPE html>
<html lang="de">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Alle Aktuellen Meldungen im Überblick - NetFusionIT</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
        }
        .container h1 {
            margin-top: 20px;
            text-align: center;
            font-weight: bold;
        }
        .filter-button {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .filter-button button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .filter-button button:hover {
            background-color: #0056b3;
        }
        .filter-form {
            display: none;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .blog-post {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #fff;
            transition: transform 0.3s ease;
        }
        .blog-post:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
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
        .pagination {
            justify-content: center;
        }
        .no-results {
            text-align: center;
            font-size: 1.2rem;
            color: #6c757d;
        }
        .reset-button {
            background-color: #6c757d;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }
        .reset-button:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container mt-5">
        <h1>Alle Aktuellen Meldungen im Überblick</h1>
        
        <!-- Filter Button -->
        <div class="filter-button">
            <button id="filter-toggle"><i class="fas fa-filter"></i> Filter</button>
        </div>
        
        <!-- Filterformular -->
        <form method="GET" class="filter-form" id="filter-form">
            <div class="row">
                <div class="col-md-3">
                    <input type="text" name="search" class="form-control" placeholder="Suche nach Titel oder Inhalt" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search'], ENT_QUOTES, 'UTF-8') : ''; ?>">
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
                            echo "<option value='" . htmlspecialchars($cat['category'], ENT_QUOTES, 'UTF-8') . "' $selected>" . htmlspecialchars($cat['category'], ENT_QUOTES, 'UTF-8') . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="date" name="date" class="form-control" value="<?php echo isset($_GET['date']) ? htmlspecialchars($_GET['date'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                </div>
                <div class="col-md-2">
                    <select name="author" class="form-control">
                        <option value="">Alle Autoren</option>
                        <?php
                        $authors = $conn->query("SELECT DISTINCT author FROM blog_posts ORDER BY author");
                        while ($author = $authors->fetch_assoc()) {
                            $selected = (isset($_GET['author']) && $_GET['author'] == $author['author']) ? 'selected' : '';
                            echo "<option value='" . htmlspecialchars($author['author'], ENT_QUOTES, 'UTF-8') . "' $selected>" . htmlspecialchars($author['author'], ENT_QUOTES, 'UTF-8') . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary btn-block">Filtern</button>
                    <button type="button" id="filter-reset" class="reset-button btn btn-block">Filter zurücksetzen</button>
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

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='col-md-4'>";
                    echo "<div class='blog-post'>";
                    echo "<img src='assets/img/" . htmlspecialchars($row['image'], ENT_QUOTES, 'UTF-8') . "' class='img-fluid' alt=''>";
                    echo "<h2><a href='aktuelles-details.php?id=" . $row['id'] . "'>" . htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8') . "</a></h2>";
                    echo "<p>" . nl2br(substr($row['content'], 0, 100)) . "...</p>";
                    echo "<small>Erstellt am: " . date('d.m.Y', strtotime($row['created_at'])) . "</small>";
                    echo "<small>Autor: " . htmlspecialchars($row['author'], ENT_QUOTES, 'UTF-8') . "</small>";
                    echo "<p><span class='badge badge-category'>" . htmlspecialchars($row['category'], ENT_QUOTES, 'UTF-8') . "</span></p>";
                    $tags = explode(',', $row['tags']);
                    foreach ($tags as $tag) {
                        echo "<span class='badge badge-tag'>" . htmlspecialchars(trim($tag), ENT_QUOTES, 'UTF-8') . "</span>";
                    }
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                if (!empty($search) || !empty($category) || !empty($date) || !empty($author)) {
                    echo "<div class='col-12 no-results'>Zu diesen Filteroptionen konnte keine Meldung in der Datenbank gefunden werden</div>";
                } else {
                    echo "<div class='col-12 no-results'>Aktuell gibt es keine Meldungen</div>";
                }
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
                        <li class="page-item <?php if ($i == $page) echo 'active'; ?>"><a class="page-link" href="aktuelles.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                    <?php endfor; ?>
                </ul>
            </nav>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            var filterForm = $("#filter-form");
            var filterToggle = $("#filter-toggle");
            var filterReset = $("#filter-reset");

            filterToggle.click(function(){
                filterForm.slideToggle();
            });

            filterReset.click(function(){
                window.location.href = 'aktuelles.php';
            });

            // Show filter form if there are active filters
            <?php if (!empty($search) || !empty($category) || !empty($date) || !empty($author)) { ?>
                filterForm.show();
            <?php } ?>
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
