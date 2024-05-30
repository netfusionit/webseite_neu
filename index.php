<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NetFusionIT</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <?php include 'header.php'; ?>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/img/slide1.jpg" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Internetdienstleistungen</h5>
                    <p>Wir bieten maßgeschneiderte Internetlösungen für Ihr Unternehmen.</p>
                    <a href="#section1" class="btn btn-primary">Mehr erfahren</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/img/slide2.jpg" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Netzwerktechnik</h5>
                    <p>Professionelle Netzwerklösungen für eine nahtlose Kommunikation.</p>
                    <a href="#section2" class="btn btn-primary">Mehr erfahren</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/img/slide3.jpg" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Webdesign</h5>
                    <p>Kreative Webdesigns, die beeindrucken und konvertieren.</p>
                    <a href="#section3" class="btn btn-primary">Mehr erfahren</a>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    
    <div class="container mt-5">
        <h1>Willkommen bei NetFusionIT</h1>
        <p>Wir bieten Internetdienstleistungen, Netzwerktechnik, Webdesign (Wordpress) und Service und Wartung.</p>
    </div>
    
    <div class="container mt-5">
        <section id="about-us">
            <div class="row">
                <div class="col-md-4">
                    <div class="icon-box">
                        <img src="/img/icon1.png" alt="Icon 1">
                        <h3>Lorem Ipsum</h3>
                        <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon-box">
                        <img src="/img/icon2.png" alt="Icon 2">
                        <h3>Dolor Sit Amet</h3>
                        <p>Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icon-box">
                        <img src="/img/icon3.png" alt="Icon 3">
                        <h3>Sed ut perspiciatis</h3>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                    </div>
                </div>
            </div>
            
            <div class="row mt-5">
                <div class="col-md-6">
                    <h2>Unleashing Potential with Creative Strategy</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                        <li><i class="fa fa-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                        <li><i class="fa fa-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                    </ul>
                    <a href="#more" class="btn btn-primary">Read More</a>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="/img/image1.jpg" class="img-fluid" alt="Image 1">
                        </div>
                        <div class="col-md-6">
                            <img src="/img/image2.jpg" class="img-fluid" alt="Image 2">
                        </div>
                        <div class="col-md-6 mt-4">
                            <img src="/img/image3.jpg" class="img-fluid" alt="Image 3">
                        </div>
                        <div class="col-md-6 mt-4">
                            <img src="/img/image4.jpg" class="img-fluid" alt="Image 4">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    <?php include 'footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
