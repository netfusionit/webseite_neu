<!DOCTYPE html>
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
            max-height: 400px;
            object-fit: cover;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        .blog-content {
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

        .reaction {
            display: flex;
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
        }

        .comment-form h3 {
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
                echo "<img src='uploads/" . $row['image'] . "' class='img-fluid blog-image' alt=''>";
                echo "<h2 class='mt-4'>" . $row['title'] . "</h2>";
                echo "<small class='text-muted'>Erstellt am: " . date('d.m.Y H:i', strtotime($row['created_at'])) . " | Autor: " . $row['author'] . "</small>";
                echo "<div class='blog-content mt-4'>" . $row['content'] . "</div>";

                // Reaktionen anzeigen
                echo "<div class='reaction'>";
                $reactions = ['like' => 'bi-hand-thumbs-up', 'love' => 'bi-heart', 'wow' => 'bi-emoji-sunglasses', 'sad' => 'bi-emoji-frown'];
                foreach ($reactions as $reaction => $icon) {
                    $count_result = $conn->query("SELECT COUNT(*) as count FROM reactions WHERE blog_id = $id AND reaction_type = '$reaction'");
                    $count = $count_result->fetch_assoc()['count'];
                    echo "<span class='bi $icon' data-reaction='$reaction' data-blog-id='$id'><span class='count'>$count</span></span>";
                }
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

                // Kommentarformular
                echo "<div class='comment-form'>";
                echo "<h3>Neuer Kommentar</h3>";
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
            } else {
                echo "<p>Blogeintrag nicht gefunden.</p>";
            }
        } else {
            echo "<p>Ungültige Anfrage.</p>";
        }
        ?>
    </div>
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
    </script>
</body>
</html>
