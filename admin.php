<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
include 'db.php';
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - NetFusionIT</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .modal .form-group {
            margin-bottom: 15px;
        }
        .image-selection img {
            max-width: 100px;
            margin: 5px;
            cursor: pointer;
            border: 2px solid transparent;
        }
        .image-selection img.selected {
            border-color: #007bff;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container mt-5">
        <h1>Admin-Bereich</h1>
        <h2>Blog-Verwaltung</h2>
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newPostModal">
            <i class="fas fa-plus-circle"></i> Neuer Beitrag
        </button>
        <button type="button" class="btn btn-secondary mb-3" data-toggle="modal" data-target="#managePostsModal">
            <i class="fas fa-tasks"></i> Beiträge verwalten
        </button>
        <button type="button" class="btn btn-secondary mb-3" data-toggle="modal" data-target="#manageCommentsModal">
            <i class="fas fa-comments"></i> Kommentarverwaltung
        </button>
        
        <h2>Benutzerverwaltung</h2>
        <button type="button" class="btn btn-secondary mb-3" data-toggle="modal" data-target="#userManagementModal">
            <i class="fas fa-users"></i> Benutzerübersicht
        </button>
        
        <h2>Meldungen</h2>
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newPopupMessageModal">
            <i class="fas fa-exclamation-circle"></i> PopUp-Meldung anlegen
        </button>
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newTickerMessageModal">
            <i class="fas fa-ticker"></i> Ticker-Meldung anlegen
        </button>
    </div>

    <!-- Modals -->
    <!-- Neuer Beitrag Modal -->
    <div class="modal fade" id="newPostModal" tabindex="-1" aria-labelledby="newPostModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newPostModalLabel">Neuer Beitrag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="add_post.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Titel</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="content">Inhalt</label>
                            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="author">Ersteller</label>
                            <input type="text" class="form-control" id="author" name="author" required>
                        </div>
                        <div class="form-group">
                            <label for="tags">Tags</label>
                            <input type="text" class="form-control" id="tags" name="tags" placeholder="Tag1, Tag2, Tag3">
                        </div>
                        <div class="form-group">
                            <label for="category">Kategorie</label>
                            <select class="form-control" id="category" name="category" required>
                                <option value="Wartungsarbeiten">Wartungsarbeiten</option>
                                <option value="Neuigkeiten">Neuigkeiten</option>
                                <option value="Notfall">Notfall</option>
                                <option value="Server">Server</option>
                                <option value="Werbung">Werbung</option>
                                <option value="AUSFALL">AUSFALL</option>
                                <option value="Kundenservice">Kundenservice</option>
                                <option value="Support">Support</option>
                                <option value="Sonstiges">Sonstiges</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Bild hochladen</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                        <div class="form-group">
                            <label for="existingImage">Bild aus vorhandenen auswählen</label>
                            <button type="button" class="btn btn-secondary" data-toggle="collapse" data-target="#imageSelection">Bilder anzeigen</button>
                            <div id="imageSelection" class="collapse mt-3 image-selection">
                                <?php
                                $images = glob("uploads/*.{jpg,jpeg,png,gif}", GLOB_BRACE);
                                foreach ($images as $image) {
                                    echo "<img src='$image' data-image='$image' class='selectable-image'>";
                                }
                                ?>
                            </div>
                            <input type="hidden" name="selected_image" id="selectedImage">
                        </div>
                        <button type="submit" class="btn btn-primary">Beitrag hinzufügen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Beiträge verwalten Modal -->
    <div class="modal fade" id="managePostsModal" tabindex="-1" aria-labelledby="managePostsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="managePostsModalLabel">Beiträge verwalten</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Titel</th>
                                <th>Ersteller</th>
                                <th>Kategorie</th>
                                <th>Aktionen</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $posts = $conn->query("SELECT * FROM blog_posts");
                            while ($post = $posts->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $post['id'] . "</td>";
                                echo "<td>" . $post['title'] . "</td>";
                                echo "<td>" . $post['author'] . "</td>";
                                echo "<td>" . $post['category'] . "</td>";
                                echo "<td>";
                                echo "<button class='btn btn-warning btn-sm' data-toggle='modal' data-target='#editPostModal" . $post['id'] . "'><i class='fas fa-edit'></i></button> ";
                                echo "<button class='btn btn-danger btn-sm' onclick='deletePost(" . $post['id'] . ")'><i class='fas fa-trash'></i></button>";
                                echo "</td>";
                                echo "</tr>";
                                ?>
                                <!-- Beitrag bearbeiten Modal -->
                                <div class="modal fade" id="editPostModal<?php echo $post['id']; ?>" tabindex="-1" aria-labelledby="editPostModalLabel<?php echo $post['id']; ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editPostModalLabel<?php echo $post['id']; ?>">Beitrag bearbeiten</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="edit_post.php" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
                                                    <div class="form-group">
                                                        <label for="title<?php echo $post['id']; ?>">Titel</label>
                                                        <input type="text" class="form-control" id="title<?php echo $post['id']; ?>" name="title" value="<?php echo $post['title']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="content<?php echo $post['id']; ?>">Inhalt</label>
                                                        <textarea class="form-control" id="content<?php echo $post['id']; ?>" name="content" rows="5" required><?php echo $post['content']; ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="author<?php echo $post['id']; ?>">Ersteller</label>
                                                        <input type="text" class="form-control" id="author<?php echo $post['id']; ?>" name="author" value="<?php echo $post['author']; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tags<?php echo $post['id']; ?>">Tags</label>
                                                        <input type="text" class="form-control" id="tags<?php echo $post['id']; ?>" name="tags" value="<?php echo $post['tags']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="category<?php echo $post['id']; ?>">Kategorie</label>
                                                        <select class="form-control" id="category<?php echo $post['id']; ?>" name="category" required>
                                                            <option value="Wartungsarbeiten" <?php echo $post['category'] == 'Wartungsarbeiten' ? 'selected' : ''; ?>>Wartungsarbeiten</option>
                                                            <option value="Neuigkeiten" <?php echo $post['category'] == 'Neuigkeiten' ? 'selected' : ''; ?>>Neuigkeiten</option>
                                                            <option value="Notfall" <?php echo $post['category'] == 'Notfall' ? 'selected' : ''; ?>>Notfall</option>
                                                            <option value="Server" <?php echo $post['category'] == 'Server' ? 'selected' : ''; ?>>Server</option>
                                                            <option value="Werbung" <?php echo $post['category'] == 'Werbung' ? 'selected' : ''; ?>>Werbung</option>
                                                            <option value="AUSFALL" <?php echo $post['category'] == 'AUSFALL' ? 'selected' : ''; ?>>AUSFALL</option>
                                                            <option value="Kundenservice" <?php echo $post['category'] == 'Kundenservice' ? 'selected' : ''; ?>>Kundenservice</option>
                                                            <option value="Support" <?php echo $post['category'] == 'Support' ? 'selected' : ''; ?>>Support</option>
                                                            <option value="Sonstiges" <?php echo $post['category'] == 'Sonstiges' ? 'selected' : ''; ?>>Sonstiges</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="image<?php echo $post['id']; ?>">Bild hochladen</label>
                                                        <input type="file" class="form-control-file" id="image<?php echo $post['id']; ?>" name="image">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="existingImage<?php echo $post['id']; ?>">Bild aus vorhandenen auswählen</label>
                                                        <button type="button" class="btn btn-secondary" data-toggle="collapse" data-target="#existingImageSelection<?php echo $post['id']; ?>">Bilder anzeigen</button>
                                                        <div id="existingImageSelection<?php echo $post['id']; ?>" class="collapse mt-3 image-selection">
                                                            <?php
                                                            foreach ($images as $image) {
                                                                echo "<img src='$image' data-image='$image' class='selectable-image'>";
                                                            }
                                                            ?>
                                                        </div>
                                                        <input type="hidden" name="selected_image" id="selectedImage<?php echo $post['id']; ?>">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Änderungen speichern</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Kommentarverwaltung Modal -->
    <div class="modal fade" id="manageCommentsModal" tabindex="-1" aria-labelledby="manageCommentsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="manageCommentsModalLabel">Kommentarverwaltung</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control mb-3" id="searchComment" placeholder="Nach Kommentar suchen...">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Beitrags-ID</th>
                                <th>Autor</th>
                                <th>Kommentar</th>
                                <th>Aktionen</th>
                            </tr>
                        </thead>
                        <tbody id="commentTableBody">
                            <?php
                            $comments = $conn->query("SELECT * FROM comments");
                            while ($comment = $comments->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $comment['id'] . "</td>";
                                echo "<td><a href='blog-details.php?id=" . $comment['blog_id'] . "'>" . $comment['blog_id'] . "</a></td>";
                                echo "<td>" . $comment['author'] . "</td>";
                                echo "<td>" . $comment['comment'] . "</td>";
                                echo "<td>";
                                echo "<button class='btn btn-danger btn-sm' onclick='deleteComment(" . $comment['id'] . ")'><i class='fas fa-trash'></i></button>";
                                echo "<button class='btn btn-info btn-sm' data-toggle='modal' data-target='#commentDetailsModal" . $comment['id'] . "'><i class='fas fa-info-circle'></i></button>";
                                echo "</td>";
                                echo "</tr>";
                                ?>
                                <!-- Kommentardetails Modal -->
                                <div class="modal fade" id="commentDetailsModal<?php echo $comment['id']; ?>" tabindex="-1" aria-labelledby="commentDetailsModalLabel<?php echo $comment['id']; ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="commentDetailsModalLabel<?php echo $comment['id']; ?>">Kommentardetails</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Autor:</strong> <?php echo $comment['author']; ?></p>
                                                <p><strong>Email:</strong> <?php echo $comment['email']; ?></p>
                                                <p><strong>Kommentar:</strong> <?php echo $comment['comment']; ?></p>
                                                <p><strong>Erstellt am:</strong> <?php echo $comment['created_at']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Benutzerverwaltung Modal -->
    <div class="modal fade" id="userManagementModal" tabindex="-1" aria-labelledby="userManagementModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userManagementModalLabel">Benutzerübersicht</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Benutzername</th>
                                <th>Email</th>
                                <th>Rolle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $users = $conn->query("SELECT * FROM users");
                            while ($user = $users->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $user['id'] . "</td>";
                                echo "<td>" . $user['username'] . "</td>";
                                echo "<td>" . $user['email'] . "</td>";
                                echo "<td>" . $user['role'] . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- PopUp-Meldung anlegen Modal -->
    <div class="modal fade" id="newPopupMessageModal" tabindex="-1" aria-labelledby="newPopupMessageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newPopupMessageModalLabel">PopUp-Meldung anlegen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="add_popup_message.php" method="post">
                        <div class="form-group">
                            <label for="popupMessageTitle">Titel</label>
                            <input type="text" class="form-control" id="popupMessageTitle" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="popupMessageContent">Inhalt</label>
                            <textarea class="form-control" id="popupMessageContent" name="content" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Meldung hinzufügen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Ticker-Meldung anlegen Modal -->
    <div class="modal fade" id="newTickerMessageModal" tabindex="-1" aria-labelledby="newTickerMessageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newTickerMessageModalLabel">Ticker-Meldung anlegen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="add_ticker_message.php" method="post">
                        <div class="form-group">
                            <label for="tickerMessageContent">Inhalt</label>
                            <textarea class="form-control" id="tickerMessageContent" name="content" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Meldung hinzufügen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <a href="logout.php" class="btn btn-danger">Logout</a>
    <?php include 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function deletePost(id) {
            if (confirm("Möchten Sie diesen Beitrag wirklich löschen?")) {
                window.location.href = 'delete_post.php?id=' + id;
            }
        }

        function deleteComment(id) {
            if (confirm("Möchten Sie diesen Kommentar wirklich löschen?")) {
                window.location.href = 'delete_comment.php?id=' + id;
            }
        }

        $(document).ready(function() {
            $('.selectable-image').on('click', function() {
                $('.selectable-image').removeClass('selected');
                $(this).addClass('selected');
                $('#selectedImage').val($(this).data('image'));
            });

            $('form').on('submit', function() {
                $(this).find('input[name="selected_image"]').val($('.selectable-image.selected').data('image'));
            });
        });

        document.getElementById('searchComment').addEventListener('input', function() {
            var searchQuery = this.value.toLowerCase();
            var commentRows = document.querySelectorAll('#commentTableBody tr');
            commentRows.forEach(function(row) {
                var comment = row.cells[3].textContent.toLowerCase();
                if (comment.includes(searchQuery)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
