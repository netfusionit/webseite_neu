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
    <a class="navbar-brand" href="index.php">
        <img src="logo.png" alt="NetFusionIT" style="width: 150px;">
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
                <a class="nav-link" href="blog.php">Aktuelles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin.php">Administration(Nur mit Login)</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Services
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
            <button class="btn btn-primary my-2 my-sm-0" type="submit">Suche</button>
        </form>
    </div>
</nav>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
