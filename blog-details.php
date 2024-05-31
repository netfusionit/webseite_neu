﻿<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Details - NetFusionIT</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .blog-image {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        .blog-content {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 20px;
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

        .reaction .bi:hover {
            transform: scale(1.2);
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
        }

        .comment-box h5 {
            margin-bottom: 10px;
        }

        .comment-box small {
            display: block;
            margin-bottom: 10px;
            color: #aaa;
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

        .tags, .categories {
            margin-top: 20px;
        }

        .tags span, .categories span {
            display: inline-block;
            background-color: #007bff;
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
                echo "<div class='reaction'>";
                $reactions = ['like' => 'bi-hand-thumbs-up', 'love' => 'bi-heart', 'wow' => 'bi-emoji-sunglasses', 'sad' => 'bi-emoji-frown'];
                foreach ($reactions as $reaction => $icon) {
                    $count_result = $conn->query("SELECT COUNT(*) as count FROM reactions WHERE blog_id = $id AND reaction_type = '$reaction'");
                    $count = $count_result->fetch_assoc()['count'];
                    echo "<span class='bi $icon' data-reaction='$reaction' data-blog-id='$id'><span class='count'>$count</span></span>";
                }
                echo "</div>";
                echo "<h2 class='mt-4'>" . $row['title'] . "</h2>";
                echo "<small class='text-muted'>Erstellt am: " . date('d.m.Y H:i', strtotime($row['created_at'])) . " | Autor: " . $row['author'] . "</small>";
                echo "<div class='blog-content mt-4'>" . $row['content'] . "</div>";

                // Kategorien und Tags anzeigen
                echo "<div class='categories'><strong>Kategorien:</strong> ";
                $categories = explode(',', $row['categories']);
                foreach ($categories as $category) {
                    echo "<span>$category</span>";
                }
                echo "</div>";

                echo "<div class='tags'><strong>Tags:</strong> ";
                $tags = explode(',', $row['tags']);
                foreach ($tags as $tag) {
                    echo "<span>$tag</span>";
                }
                echo "</div>";

                // Kommentarformular
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
                echo "<h3 class='mt-5'>Kommentare</h3>";
                $comment_result = $conn->query("SELECT * FROM comments WHERE blog_id = $id ORDER BY created_at DESC");
                while ($comment = $comment_result->fetch_assoc()) {
                    echo "<div class='comment-box'>";
                    echo "<h5>" . $comment['author'] . "</h5>";
                    echo "<small>Kommentiert am: " . date('d.m.Y H:i', strtotime($comment['created_at'])) . "</small>";
                    echo "<p>" . $comment['comment'] . "</p>";
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
<section id="blog" class="blog section py-5">
    <div class="container section-title text-center" data-aos="fade-up">
        <h2>Weitere Meldungen</h2>
        <p>Lesen Sie weitere Nachrichten und Updates</p>
    </div>
    <div class="container">
        <div id="blogCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php
                $result = $conn->query("SELECT * FROM blog_posts ORDER BY created_at DESC");
                $totalPosts = $result->num_rows;
                $active = "active";
                $counter = 0;
                $itemOpen = false;

                while ($row = $result->fetch_assoc()) {
                    if ($counter % 3 == 0) {
                        if ($itemOpen) {
                            echo "</div></div>";
                        }
                        echo "<div class='carousel-item $active'>";
                        echo "<div class='row'>";
                        $active = "";
                        $itemOpen = true;
                    }
                    echo "<div class='col-lg-4 col-md-6'>";
                    echo "<div class='card blog-item'>";
                    echo "<img src='assets/img/" . $row['image'] . "' class='card-img-top' alt=''>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'><a href='blog-details.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></h5>";
                    echo "<p class='card-text'>" . substr($row['content'], 0, 100) . "...</p>";
                    echo "<a href='blog-details.php?id=" . $row['id'] . "' class='btn btn-primary'>Weiterlesen</a>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    $counter++;
                }

                if ($itemOpen) {
                    echo "</div></div>";
                }
                ?>
            </div>
            <a class="carousel-control-prev" href="#blogCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#blogCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section><!-- /Blog Section -->

    <?php include 'footer.php'; ?>

    <script>
        document.querySelectorAll('.bi').forEach(function(icon) {
            icon.addEventListener('click', function() {
                let reaction = this.getAttribute('data-reaction');
                let blogId = this.getAttribute('data-blog-id');
                
                fetch('add_reaction.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'blog_id=' + blogId + '&reaction_type=' + reaction
                })
                .then(response => response.text())
                .then(data => {
                    if (data === 'Reaktion gespeichert') {
                        let countSpan = this.querySelector('.count');
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
    </script>

</body>
</html>