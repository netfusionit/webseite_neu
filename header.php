<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NetFusionIT</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.1/font/bootstrap-icons.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="index.php">NetFusionIT
        <img src="/img/logo_transparent_neu.png" alt="NetFusionIT Logo" style="height: 40px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Startseite</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="kontakt.php">Kontakt</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="aktuelles.php">Aktuelles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin.php">Administration</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Online-Services
                </a>
                <div class="dropdown-menu" aria-labelledby="servicesDropdown">
                    <a class="dropdown-item" href="webdesign.php">Webdesign</a>
                    <a class="dropdown-item" href="hosting.php">Hosting</a>
                    <a class="dropdown-item" href="seo.php">SEO</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="search.php" method="get">
            <input class="form-control mr-sm-2" type="search" placeholder="Suche" aria-label="Suche" name="query">
            <button class="btn btn-primary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
        </form>
        <button class="btn btn-info ml-2" data-toggle="modal" data-target="#changelogModal">
            <i class="fas fa-info-circle"></i>
        </button>
    </div>
</nav>

<!-- Changelog Modal -->
<div class="modal fade" id="changelogModal" tabindex="-1" aria-labelledby="changelogModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changelogModalLabel">Letzte Änderungen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Schließen">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                include 'db.php';
                $changes = $conn->query("SELECT * FROM changelog ORDER BY date DESC");
                while ($change = $changes->fetch_assoc()) {
                    echo "<h5>" . $change['title'] . "</h5>";
                    echo "<p><strong>Aktiv seit:</strong> " . $change['active_since'] . "</p>";
                    echo "<p><strong>Kategorie:</strong> " . $change['category'] . "</p>";
                    echo "<p>" . $change['description'] . "</p>";
                    echo "<hr>";
                }
                ?>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
