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
            transition: transform 0.3s ease, filter 0.3s ease;
        }

        .reaction .bi.clicked {
            filter: invert(1);
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
            transition: transform 0.3s ease, filter 0.3s ease;
        }

        .comment-reaction .count {
            font-size: 1rem;
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
            border-top: 2px solid #ddd;
            padding-top: 20px;
            margin-top: 20px;
        }

        .blog-section .section-title {
            margin-bottom: 20px;
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
                echo "<div class='reaction' id='reactions'>";
                $reactions = ['like' => 'bi-hand-thumbs-up', 'love' => 'bi-heart', 'wow' => 'bi-emoji-sunglasses', 'sad' => 'bi-emoji-frown'];
                foreach ($reactions as $reaction => $icon) {
                    echo "<span class='bi $icon' data-reaction='$reaction' data-blog-id='$id'><span class='count'></span></span>";
                }
                echo "</div>";
                echo "<h2 class='mt-4'>" . $row['title'] . "</h2>";
                echo "<small class='text-muted'>Erstellt am: " . date('d.m.Y H:i', strtotime($row['created_at'])) . " | Autor: " . $row['author'] . "</small>";
                
                // Kategorien anzeigen
                echo "<div class='categories mt-2'>";
                $categories = explode(',', $row['category']);
                foreach ($categories as $category) {
                    echo "<span>$category</span>";
                }
                echo "</div>";

                echo "<div class='blog-content-box mt-4'>";
                echo "<div class='blog-content'>" . $row['content'] . "</div>";
                echo "</div>";

                // Tags anzeigen
                echo "<div class='tags'>";
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
                    echo "<div class='comment-reaction' id='comment-reaction-" . $comment['id'] . "'>";
                    echo "<span class='count'>" . $comment['likes'] . "</span><span class='bi bi-hand-thumbs-up' data-reaction='like' data-comment-id='" . $comment['id'] . "'></span>";
                    echo "<span class='count'>" . $comment['dislikes'] . "</span><span class='bi bi-hand-thumbs-down' data-reaction='dislike' data-comment-id='" . $comment['id'] . "'></span>";
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
<section id="blog" class="blog-section py-5">
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
                                icon.previousElementSibling.textContent = data[reaction];
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
                    
                    // Invertieren für 10 Sekunden
                    this.classList.add('clicked');
                    setTimeout(() => {
                        this.classList.remove('clicked');
                    }, 10000);
                    
                    fetch('add_reaction.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: 'blog_id=' + blogId + '&reaction_type=' + reaction + '&comment_id=' + commentId
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
        });
    </script>

</body>
</html>
