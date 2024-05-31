<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - NetFusionIT</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <style>
        .filter-form {
            margin-bottom: 20px;
        }
        .blog-post {
            margin-bottom: 20px;
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
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container mt-5">
        <h1>Blog</h1>
        
        <!-- Filterformular -->
        <form method="GET" class="filter-form">
            <div class="row">
                <div class="col-md-3">
                    <input type="text" name="search" class="form-control" placeholder="Suche nach Titel oder Inhalt" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                </div>
                <div class="col-md-3">
                    <select name="category" class="form-control">
                        <option value="">Alle Kategorien</option>
                        <?php
                        $categories = $conn->query("SELECT DISTINCT category FROM blog_posts ORDER BY category");
                        while ($cat = $categories->fetch_assoc()) {
                            $selected = (isset($_GET['category']) && $_GET['category'] == $cat['category']) ? 'selected' : '';
                            echo "<option value='" . $cat['category'] . "' $selected>" . $cat['category'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="date" name="date" class="form-control" value="<?php echo isset($_GET['date']) ? $_GET['date'] : ''; ?>">
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

            $query .= " ORDER BY created_at DESC";
            $result = $conn->query($query);

            while ($row = $result->fetch_assoc()) {
                echo "<div class='col-md-4'>";
                echo "<div class='blog-post'>";
                echo "<h2><a href='blog-details.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></h2>";
                echo "<p>" . substr($row['content'], 0, 100) . "...</p>";
                echo "<small>Erstellt am: " . date('d.m.Y', strtotime($row['created_at'])) . "</small>";
                echo "<p><span class='badge badge-category'>" . $row['category'] . "</span></p>";
                $tags = explode(',', $row['tags']);
                foreach ($tags as $tag) {
                    echo "<span class='badge badge-tag'>" . trim($tag) . "</span>";
                }
                echo "</div>";
                echo "</div>";
            }

            $conn->close();
            ?>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
