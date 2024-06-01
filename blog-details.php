<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Details - NetFusionIT</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .blog-image {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .blog-content-box {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            background-color: #ffffff;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .reaction {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            margin-top: 10px;
        }

        .reaction .bi {
            font-size: 1.5rem;
            cursor: pointer;
            margin-right: 10px;
            transition: transform 0.3s ease;
        }

        .reaction .bi.animate {
            animation: pop 0.6s ease-in-out 3;
        }

        @keyframes pop {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.2); }
        }

        .reaction .count {
            font-size: 1rem;
            margin-left: 5px;
        }

        .comment-form {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            background-color: #f1f1f1;
            margin-top: 20px;
            display: none;
        }

        .comment-form h3 {
            margin-bottom: 20px;
        }

        .comment-box {
            border: 1px solid #ddd;
            padding: 15px;
            margin-top: 20px;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .comment-box h5 {
            margin-bottom: 10px;
        }

        .comment-box small {
            display: block;
            margin-bottom: 10px;
            color: #aaa;
        }

        .comment-reaction {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            margin-top: 10px;
        }

        .comment-reaction .bi {
            font-size: 1.2rem;
            cursor: pointer;
            margin-left: 5px;
            transition: transform 0.3s ease;
        }

        .comment-reaction .bi.animate {
            animation: pop 0.6s ease-in-out 3;
        }

        .comment-reaction .count {
            font-size: 1rem;
            margin-left: 5px;
            margin-right: 5px;
        }

        .toggle-comment {
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            padding: 10px;
            background-color: #f1f1f1;
            border: 1px solid #ddd;
            border-radius: 10px;
            margin-top: 20px;
        }

        .toggle-comment h3 {
            margin: 0;
        }

        .toggle-comment .toggle-icon {
            transition: transform 0.3s ease;
        }

        .toggle-comment.collapsed .toggle-icon {
            transform: rotate(180deg);
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination .page-item {
            margin: 0 5px;
        }

        .tags span {
            background-color: #ffeb3b;
            color: #000;
            padding: 5px 10px;
            border-radius: 20px;
            margin-right: 5px;
            margin-bottom: 5px;
        }

        .categories span {
            background-color: #4caf50;
            color: #fff;
            padding: 5px 10px;
            border-radius: 20px;
            margin-right: 5px;
            margin-bottom: 5px;
        }

        .carousel-item {
            display: none;
        }

        .carousel-item.active {
            display: block;
        }

        section:nth-child(even) {
            background-color: #f9f9f9;
        }

        section:nth-child(odd) {
            background-color: #ffffff;
        }

        .blog-section {
            background-color: #e9ecef;
            padding: 40px 0;
        }

        .blog-section .section-title {
            margin-bottom: 20px;
        }

        .blog-content-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .blog-title, .blog-meta, .blog-tags {
            margin-bottom: 20px;
        }

        .blog-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid #ddd;
            padding-top: 10px;
            margin-top: 20px;
        }

        .bg-dark-footer {
            background-color: #343a40;
            color: #ffffff;
            padding: 10px;
            border-radius: 10px;
        }

        .bg-dark-footer .tags span {
            background-color: #ffeb3b;
            color: #000;
        }

        .bg-dark-footer .reaction {
            justify-content: flex-end;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container mt-5">
        <?php
        include 'db.php';
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $result = $conn->query("SELECT * FROM blog_posts WHERE id = $id");
            if ($row = $result->fetch_assoc()) {
                echo "<h1 class='mb-4'>" . $row['title'] . "</h1>";
                echo "<img src='assets/img/" . $row['image'] . "' class='img-fluid blog-image' alt=''>";
                echo "<div class='blog-content-box mt-4'>";
                echo "<h2 class='blog-title'>" . $row['title'] . "</h2>";
                echo "<div class='blog-content-meta'>";
                echo "<small class='text-muted'>Erstellt am: " . date('d.m.Y H:i', strtotime($row['created_at'])) . " | Letzte Aktualisierung: " . date('d.m.Y H:i', strtotime($row['updated_at'])) . " | Autor: " . $row['author'] . "</small>";
                echo "<div class='categories'>";
                $categories = explode(',', $row['category']);
                foreach ($categories as $category) {
                    echo "<span>$category</span>";
                }
                echo "</div>";
                echo "</div>";
                echo "<div class='blog-content'>" . $row['content'] . "</div>";


                // Footer mit Trennlinie und Reaktionen
                echo "<div class='blog-footer bg-dark-footer'>";
                echo "<div class='tags'>";
                $tags = explode(',', $row['tags']);
                foreach ($tags as $tag) {
                    echo "<span>$tag</span>";
                }
                echo "</div>";
                echo "<div class='reaction'>";
                foreach ($reactions as $reaction => $icon) {
                    echo "<span class='bi $icon' data-reaction='$reaction' data-blog-id='$id'><span class='count'></span></span>";
                }
                echo "</div>";
                echo "</div>";
                echo "</div>";

                // Kommentarformular
                echo "<h3 class='mt-5'>Kommentare</h3>";
                echo "<div class='toggle-comment'>";
                echo "<h3>Neuer Kommentar</h3><i class='fas fa-chevron-up toggle-icon'></i>";
                echo "</div>";
                echo "<div class='comment-form'>";
                echo "<form action='add_comment.php' method='post'>";
                echo "<input type='hidden' name='blog_id' value='$id'>";
                echo "<div class='form-group'>";
                echo "<label for='author'>Name</label>";
                echo "<input type='text' class='form-control' id='author' name='author' required>";
                echo "</div>";
                echo "<div class='form-group'>";
                echo "<label for='email'>Email</label>";
                echo "<input type='email' class='form-control' id='email' name='email' required>";
                echo "</div>";
                echo "<div class='form-group'>";
                echo "<label for='comment'>Kommentar</label>";
                echo "<textarea class='form-control' id='comment' name='comment' rows='3' required></textarea>";
                echo "</div>";
                echo "<button type='submit' class='btn btn-primary'>Kommentar hinzufügen</button>";
                echo "</form>";
                echo "</div>";

                // Kommentare anzeigen
                $comment_result = $conn->query("SELECT * FROM comments WHERE blog_id = $id ORDER BY created_at DESC");
                while ($comment = $comment_result->fetch_assoc()) {
                    echo "<div class='comment-box'>";
                    echo "<h5>" . $comment['author'] . "</h5>";
                    echo "<small>Kommentiert am: " . date('d.m.Y H:i', strtotime($comment['created_at'])) . "</small>";
                    echo "<p>" . $comment['comment'] . "</p>";
                    echo "<div class='comment-reaction' id='comment-reaction-" . $comment['id'] . "'>";
                    echo "<span class='bi bi-hand-thumbs-up' data-reaction='like' data-comment-id='" . $comment['id'] . "'></span>";
                    echo "<span class='count'></span>";
                    echo "<span class='bi bi-hand-thumbs-down' data-reaction='dislike' data-comment-id='" . $comment['id'] . "'></span>";
                    echo "<span class='count'></span>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>Blogeintrag nicht gefunden.</p>";
            }
        } else {
            echo "<p>Ungültige Anfrage.</p>";
        }
        ?>
    </div>

    <!-- Blog Section -->
    <section id="blog" class="blog section bg-dark py-5">
        <div class="container section-title text-center" data-aos="fade-up">
            <h2 class="text-white">Aktuelle Meldungen</h2>
            <p class="text-light">Lesen Sie unsere neuesten Nachrichten und Updates</p>
        </div>
        <div class="container">
            <div class="row gy-3">
                <?php
                include 'db.php';

                // Pagination
                $limit = 3; // Anzahl der Beiträge pro Seite
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $start = ($page - 1) * $limit;

                // Beiträge abrufen
                $result = $conn->query("SELECT * FROM blog_posts ORDER BY created_at DESC LIMIT $start, $limit");
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='col-lg-4 col-md-6' data-aos='fade-up' data-aos-delay='100'>";
                    echo "<div class='card blog-item'>";
                    echo "<img src='assets/img/" . $row['image'] . "' class='card-img-top' alt=''>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'><a href='blog-details.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></h5>";
                    echo "<p class='card-text'>" . substr($row['content'], 0, 100) . "...</p>";
                    echo "<p class='card-text'><small class='text-muted'>Erstellt am: " . date('d.m.Y', strtotime($row['created_at'])) . " | Letzte Aktualisierung: " . date('d.m.Y', strtotime($row['updated_at'])) . "</small></p>";

                    // Kategorie anzeigen
                    echo "<p class='card-text'><span class='badge badge-category'>" . $row['category'] . "</span></p>";

                    // Tags anzeigen
                    $tags = explode(',', $row['tags']);
                    echo "<p class='card-text'>";
                    foreach ($tags as $tag) {
                        echo "<span class='badge badge-tag'>" . trim($tag) . "</span>";
                    }
                    echo "</p>";

                    echo "<a href='blog-details.php?id=" . $row['id'] . "' class='btn btn-primary'>Weiterlesen</a>";
                    echo "</div>";
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
        </div>
        <div class="container">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <?php for ($i = 1; $i <= $pages; $i++): ?>
                        <li class="page-item <?php if ($i == $page) echo 'active'; ?>"><a class="page-link" href="index.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                    <?php endfor; ?>
                </ul>
            </nav>
        </div>
    </section><!-- /Blog Section -->

    <?php include 'footer.php'; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Reaktionen für den Blog-Post laden
            let blogId = <?php echo $id; ?>;
            fetch('load_reactions.php?blog_id=' + blogId)
                .then(response => response.json())
                .then(data => {
                    document.querySelectorAll('.reaction span[data-reaction]').forEach(function(icon) {
                        let reaction = icon.getAttribute('data-reaction');
                        if (data[reaction] !== undefined) {
                            icon.querySelector('.count').textContent = data[reaction];
                        }
                    });
                });

            // Reaktionen für Kommentare laden
            document.querySelectorAll('.comment-reaction').forEach(function(reactionBox) {
                let commentId = reactionBox.id.split('-')[2];
                fetch('load_comment_reactions.php?comment_id=' + commentId)
                    .then(response => response.json())
                    .then(data => {
                        reactionBox.querySelectorAll('span[data-reaction]').forEach(function(icon) {
                            let reaction = icon.getAttribute('data-reaction');
                            if (data[reaction] !== undefined) {
                                icon.nextElementSibling.textContent = data[reaction];
                            }
                        });
                    });
            });

            // Reaktions-Event-Listener hinzufügen
            document.querySelectorAll('.bi').forEach(function(icon) {
                icon.addEventListener('click', function() {
                    let reaction = this.getAttribute('data-reaction');
                    let blogId = this.getAttribute('data-blog-id');
                    let commentId = this.getAttribute('data-comment-id');
                    
                    // Aufpochen lassen
                    this.classList.add('animate');
                    setTimeout(() => {
                        this.classList.remove('animate');
                    }, 1800);
                    
                    fetch('add_reaction.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: 'blog_id=' + blogId + '&reaction_type=' + reaction + '&comment_id=' + commentId
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            let countSpan = this.nextElementSibling;
                            countSpan.textContent = parseInt(countSpan.textContent) + 1;
                        }
                    });
                });
            });

            document.querySelector('.toggle-comment').addEventListener('click', function() {
                var form = document.querySelector('.comment-form');
                form.style.display = form.style.display === 'block' ? 'none' : 'block';
                this.classList.toggle('collapsed');
            });

            $('.carousel').carousel({
                interval: 5000
            });
        });
    </script>

</body>
</html>
