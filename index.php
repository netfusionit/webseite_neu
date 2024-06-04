<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NetFusionIT</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'header.php'; ?>

    <!-- Popup-Meldung (Nur wenn in DB vorhanden!) -->
    <div id="popupMessage" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Wichtige Meldung</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Schließen">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="popupContent"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Schließen</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Ticker-Meldung (Nur wenn in DB vorhanden!) -->
    <div id="tickerMessage" class="bg-warning text-dark text-center py-2">
        <p class="mb-0" id="tickerContent"></p>
    </div>
        <div class="alert alert-primary" role="alert">
        <h5>Willkommen bei NetFusionIT!</h5> <br>
        Unsere Webseite befindet sich derzeit im Aufbau! <br>
        Voraussichtliche Fertigsstellung: 10.06.2024
    </div>
    
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/img/slide1.jpg" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption d-md-block">
                    <h5>Internetdienstleistungen</h5>
                    <p>Wir bieten maßgeschneiderte Internetlösungen für Ihr Unternehmen.</p>
                    <a href="#section1" class="btn btn-primary">Mehr erfahren</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/img/slide2.jpg" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption d-md-block">
                    <h5>Netzwerktechnik</h5>
                    <p>Professionelle Netzwerklösungen für eine nahtlose Kommunikation.</p>
                    <a href="#section2" class="btn btn-primary">Mehr erfahren</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/img/slide3.jpg" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption d-md-block">
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

    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section bg-alt-1">
        <div class="container">
            <div class="row gy-4">
                <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item d-flex">
                        <div class="icon flex-shrink-0"><i class="bi bi-briefcase"></i></div>
                        <div>
                            <h4 class="title"><a href="#" class="stretched-link">Support/Helpdesk</a></h4>
                            <p class="description">Hier gelangen Sie zu unserem Ticketsystem!</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item d-flex">
                        <div class="icon flex-shrink-0"><i class="bi bi-card-checklist"></i></div>
                        <div>
                            <h4 class="title"><a href="#" class="stretched-link">Cloud</a></h4>
                            <p class="description">Hier erhlaten Sie Direktzugriff zu unserer Cloud!</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item d-flex">
                        <div class="icon flex-shrink-0"><i class="bi bi-graph-up"></i></div>
                        <div>
                            <h4 class="title"><a href="https://status.netfusionit.de" class="stretched-link">Systemstatus</a></h4>
                            <p class="description">Sehen Sie hier den aktuellen Status der NetFusionIT-Onlinesysteme!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Featured Services Section -->

    <!-- About Section -->
    <section id="about" class="about section">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                <p class="who-we-are">ÜBER NetFusionIT</p>
                <h3>Potential freisetzen mit kreativer Strategie</h3>
                <p class="fst-italic">
                    Wir bieten maßgeschneiderte Lösungen im Bereich Netzwerktechnik und Internetdienstleistungen, um Ihr Unternehmen auf die nächste Stufe zu heben.
                </p>
                <ul>
                    <li><i class="bi bi-check-circle"></i> <span>Professionelle Netzwerktechnik und Internetdienstleistungen.</span></li>
                    <li><i class="bi bi-check-circle"></i> <span>Modernes Wordpress-Webdesign für einen starken Online-Auftritt.</span></li>
                    <li><i class="bi bi-check-circle"></i> <span>Umfassender Service, Support und Wartung für dauerhafte Zuverlässigkeit.</span></li>
                </ul>
                    <a href="#features" class="read-more"><span>Mehr erfahren</span><i class="bi bi-arrow-right"></i></a>
                </div>
                <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
                    <div class="row gy-4">
                        <div class="col-lg-6">
                            <img src="/img/placeholder2.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="col-lg-6">
                            <div class="row gy-4">
                                <div class="col-lg-12 mb-2">
                                    <img src="/img/placeholder.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="col-lg-12">
                                    <img src="/img/placeholder.jpg" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /About Section -->

<!-- Features Section -->
<section id="features" class="features section bg-alt-2">
    <div class="container section-title" data-aos="fade-up">
        <h2 class="text-center">Features</h2>
        <p class="text-center">Unsere erstklassigen Dienstleistungen, die Ihr Unternehmen voranbringen</p>
    </div><!-- End Section Title -->

    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5 d-flex align-items-center">
                <ul class="nav nav-tabs flex-column" data-aos="fade-up" data-aos-delay="100">
                    <li class="nav-item">
                        <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                            <i class="bi bi-router"></i>
                            <div>
                                <h4>Netzwerktechnik und Internetdienstleistungen</h4>
                                <p>Optimierung Ihrer Netzwerkinfrastruktur und Sicherheit.</p>
                                <ul>
                                    <li>&bull; Planung und Implementierung</li>
                                    <li>&bull; Wartung und Support</li>
                                    <li>&bull; Sicherheitslösungen</li>
                                </ul>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                            <i class="bi bi-wordpress"></i>
                            <div>
                                <h4>WordPress-Webdesign</h4>
                                <p>Individuelle und SEO-optimierte Webseiten.</p>
                                <ul>
                                    <li>&bull; Individuelle Designs</li>
                                    <li>&bull; SEO-optimierte Struktur</li>
                                    <li>&bull; Benutzerfreundlich</li>
                                </ul>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
                            <i class="bi bi-headset"></i>
                            <div>
                                <h4>Service, Support und Wartung</h4>
                                <p>24/7 Unterstützung für Ihre IT-Systeme.</p>
                                <ul>
                                    <li>&bull; 24/7 Support</li>
                                    <li>&bull; Regelmäßige Updates</li>
                                    <li>&bull; Schnelle Fehlerbehebung</li>
                                </ul>
                            </div>
                        </a>
                    </li>
                </ul><!-- End Tab Nav -->
                </div>
                <div class="col-lg-6">
                    <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
                        <div class="tab-pane fade active show" id="features-tab-1">
                            <img src="assets/img/tabs-1.jpg" alt="" class="img-fluid">
                        </div><!-- End Tab Content Item -->
                        <div class="tab-pane fade" id="features-tab-2">
                            <img src="assets/img/tabs-2.jpg" alt="" class="img-fluid">
                        </div><!-- End Tab Content Item -->
                        <div class="tab-pane fade" id="features-tab-3">
                            <img src="assets/img/tabs-3.jpg" alt="" class="img-fluid">
                        </div><!-- End Tab Content Item -->
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Features Section -->

    <!-- Features Details Section -->
    <section id="features-details" class="features-details section bg-alt-1">
        <div class="container">
            <div class="row gy-4 justify-content-between features-item">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <img src="assets/img/features-1.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-5 d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="content">
                        <h3>Corporis temporibus maiores provident</h3>
                        <p>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>
                        <a href="#" class="btn more-btn">Learn More</a>
                    </div>
                </div>
            </div><!-- Features Item -->
            <div class="row gy-4 justify-content-between features-item">
                <div class="col-lg-5 d-flex align-items-center order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">
                    <div class="content">
                        <h3>Neque ipsum omnis sapiente quod quia dicta</h3>
                        <p>Quidem qui dolore incidunt aut. In assumenda harum id iusto lorena plasico mares</p>
                        <ul>
                            <li><i class="bi bi-easel flex-shrink-0"></i> Et corporis ea eveniet ducimus.</li>
                            <li><i class="bi bi-patch-check flex-shrink-0"></i> Exercitationem dolorem sapiente.</li>
                            <li><i class="bi bi-brightness-high flex-shrink-0"></i> Veniam quia modi magnam.</li>
                        </ul>
                        <p></p>
                        <a href="#" class="btn more-btn">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="200">
                    <img src="assets/img/features-2.jpg" class="img-fluid" alt="">
                </div>
            </div><!-- Features Item -->
        </div>
    </section><!-- /Features Details Section -->

    <!-- Services Section -->
    <section id="services" class="services section bg-alt-2">
        <div class="container section-title" data-aos="fade-up">
            <h2>Services</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item item-cyan position-relative">
                        <i class="bi bi-activity icon"></i>
                        <div>
                            <h3>Nesciunt Mete</h3>
                            <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.</p>
                            <a href="service-details.html" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item item-orange position-relative">
                        <i class="bi bi-broadcast icon"></i>
                        <div>
                            <h3>Eosle Commodi</h3>
                            <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic non ut nesciunt dolorem.</p>
                            <a href="service-details.html" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item item-teal position-relative">
                        <i class="bi bi-easel icon"></i>
                        <div>
                            <h3>Ledo Markt</h3>
                            <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.</p>
                            <a href="service-details.html" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item item-red position-relative">
                        <i class="bi bi-bounding-box-circles icon"></i>
                        <div>
                            <h3>Asperiores Commodi</h3>
                            <p>Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga sit provident adipisci neque.</p>
                            <a href="service-details.html" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="service-item item-indigo position-relative">
                        <i class="bi bi-calendar4-week icon"></i>
                        <div>
                            <h3>Velit Doloremque.</h3>
                            <p>Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed animi at autem alias eius labore.</p>
                            <a href="service-details.html" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-item item-pink position-relative">
                        <i class="bi bi-chat-square-text icon"></i>
                        <div>
                            <h3>Dolori Architecto</h3>
                            <p>Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure. Corrupti recusandae ducimus enim.</p>
                            <a href="service-details.html" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div><!-- End Service Item -->
            </div>
        </div>
    </section><!-- /Services Section -->

    <!-- Blog Section -->
    <section id="blog" class="blog section bg-alt-1 py-5">
        <div class="container section-title text-center" data-aos="fade-up">
            <h2>Aktuelle Meldungen</h2>
            <p>Lesen Sie unsere neuesten Nachrichten und Updates</p>
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
                    echo "<img src='/uploads/" . $row['image'] . "' class='card-img-top' alt=''>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'><a href='aktuelles-details.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></h5>";
                    echo "<p class='card-text'>" . substr($row['content'], 0, 100) . "...</p>";
                    echo "<p class='card-text'><small class='text-muted'>Erstellt am: " . date('d.m.Y', strtotime($row['created_at'])) . "</small></p>";

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

<!-- Contact Section -->
<section id="contact" class="contact section bg-alt-2 py-5">
    <div class="container">
        <div class="section-title text-center" data-aos="fade-up">
            <h2>Kontakt</h2>
            <p>Wir freuen uns von Ihnen zu hören</p>
        </div>
        <div class="row gy-4">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="info-item d-flex align-items-start mb-4">
                    <i class="bi bi-envelope flex-shrink-0 icon-animated"></i>
                    <div class="ms-3">
                        <h3>Email</h3>
                        <p>info@example.com</p>
                    </div>
                </div>
                <div class="info-item d-flex align-items-start mb-4">
                    <i class="bi bi-phone flex-shrink-0 icon-animated"></i>
                    <div class="ms-3">
                        <h3>Telefon</h3>
                        <p>+1 5589 55488 55</p>
                    </div>
                </div>
                <div class="info-item d-flex align-items-start mb-4">
                    <i class="bi bi-clock flex-shrink-0 icon-animated"></i>
                    <div class="ms-3">
                        <h3>Öffnungszeiten</h3>
                        <p>Mo - Fr: 9:00 - 18:00</p>
                    </div>
                </div>
                <div class="info-item d-flex align-items-start mb-4">
                    <i class="bi bi-chat flex-shrink-0 icon-animated"></i>
                    <div class="ms-3">
                        <h3>Live Chat</h3>
                        <p>Starten Sie einen Chat mit unserem Support</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="contact-form-box p-4">
                    <form action="send_email.php" method="post" class="php-email-form" id="contact-form">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Ihr Name" required>
                        </div>
                        <div class="form-group mt-3">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Ihre Email" required>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Betreff" required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Nachricht" required></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="security-question">Sicherheitsfrage: Was ist 3 + 5?</label>
                            <input type="text" class="form-control" name="security-answer" id="security-answer" placeholder="Antwort" required>
                        </div>
                        <div class="my-3">
                            <div class="loading">Wird geladen...</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Ihre Nachricht wurde gesendet. Vielen Dank!</div>
                        </div>
                        <div class="text-center">
                            <button type="submit" id="submit-button" class="btn btn-primary" disabled>Nachricht senden</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Contact Section -->

<div id="searchAssistantModal">
    <h3>Search Assistant</h3>
    <p>Position: <span id="currentPosition">0</span>/100%</p>
    <!-- <p>Verbleibend: <span id="remainingPercentage">0</span>%</p> -->
    <div class="mini-map" id="miniMapContainer"></div>
    <br>
    <div class="legend">
        <div><span class="current"></span>Grün: Gewähltes Ergebnis</div>
        <div><span class="other"></span>Gelb: Andere Ergebnisse</div>
        <div><span class="position"></span>Rot: Aktuelle Position</div>
    </div>
    <div id="remainingIndicator" class="remaining-indicator"></div>
    <button onclick="endSearch()">Suche Beenden</button>
</div>
<button id="searchAssistantModalToggle" onclick="toggleSearchAssistant()" class="hidden"><i class="fas fa-search"></i></button>

    <?php include 'footer.php'; ?>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Popup-Meldung
            $.get('fetch_popup.php', function(data) {
                var result = JSON.parse(data);
                if (result.message.trim() !== '') {
                    $('#popupContent').html(result.message);
                    $('#popupMessage').modal('show');
                }
            });

            // Ticker-Meldung
            $.get('fetch_ticker.php', function(data) {
                var result = JSON.parse(data);
                if (result.message.trim() !== '') {
                    $('#tickerContent').html(result.message);
                    $('#tickerMessage').show();
                } else {
                    $('#tickerMessage').hide();
                }
            });
        });
   
</script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script>
    // AOS Initialization
    AOS.init();

    // Enable submit button when security question is answered correctly and form is valid
    function checkFormValidity() {
        const form = document.getElementById('contact-form');
        const submitButton = document.getElementById('submit-button');
        const securityAnswer = document.getElementById('security-answer').value;

        if (form.checkValidity() && securityAnswer.trim() === '8') {
            submitButton.disabled = false;
        } else {
            submitButton.disabled = true;
        }
    }

    // Listen for form inputs
    document.getElementById('contact-form').addEventListener('input', checkFormValidity);
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const params = new URLSearchParams(window.location.search);
    const query = params.get('query');
    const lineNumber = window.location.hash.split("-")[1];

    if (query) {
        showSearchAssistant(query, lineNumber);
        document.getElementById('searchAssistantModalToggle').classList.remove('hidden');
        markQuery(query);
    }
});

function markQuery(query) {
    const regex = new RegExp(`(${query})`, 'gi');
    traverseDOM(document.body, regex);
    communicateResultsToAssistant();
}

function traverseDOM(element, regex) {
    if (element.nodeType === 3) { // Text node
        const matches = element.nodeValue.match(regex);
        if (matches) {
            const markElement = document.createElement('span');
            markElement.innerHTML = element.nodeValue.replace(regex, '<mark class="highlight-mark">$1</mark>');
            element.replaceWith(markElement);
        }
    } else if (element.nodeType === 1 && element.nodeName !== 'SCRIPT' && element.nodeName !== 'STYLE') { // Element node
        Array.from(element.childNodes).forEach(child => traverseDOM(child, regex));
    }
}

function communicateResultsToAssistant() {
    const highlights = document.querySelectorAll('mark.highlight-mark');
    const searchResults = Array.from(highlights).map(highlight => ({
        top: highlight.getBoundingClientRect().top + window.scrollY,
    }));
    window.searchResults = searchResults;
    showSearchAssistantResults();
}

function showSearchAssistant(query, lineNumber) {
    const searchAssistantModal = document.getElementById('searchAssistantModal');
    searchAssistantModal.style.display = 'block';
    const positionIndicator = document.getElementById('currentPosition');
    const miniMapContainer = document.getElementById('miniMapContainer');

    miniMapContainer.innerHTML = '';

    showSearchAssistantResults();

    const positionBar = document.createElement('div');
    positionBar.classList.add('bar', 'position-bar');
    miniMapContainer.appendChild(positionBar);

    function updatePositionBar() {
        const scrollPosition = (window.scrollY / (document.body.scrollHeight - window.innerHeight)) * 100;
        positionBar.style.top = `${Math.min(scrollPosition, 100)}%`;
        positionIndicator.innerText = Math.round(scrollPosition);
    }

    document.addEventListener('scroll', updatePositionBar);
    updatePositionBar();
}

function showSearchAssistantResults() {
    if (!window.searchResults) return;

    const miniMapContainer = document.getElementById('miniMapContainer');
    miniMapContainer.innerHTML = '';

    let selectedResult = null;
    window.searchResults.forEach((result, index) => {
        const bar = document.createElement('div');
        bar.classList.add('bar');
        const position = Math.min(Math.round((result.top / (document.body.scrollHeight - window.innerHeight)) * 100), 100);
        bar.style.top = `${position - 5}%`; // Verschieben um 5% nach oben
        if (index === 0) {
            bar.classList.add('current-bar');
            selectedResult = result;
        } else {
            bar.classList.add('other-bar');
        }
        miniMapContainer.appendChild(bar);
    });

    if (selectedResult) {
        const highlightElement = document.createElement('div');
        highlightElement.classList.add('highlight', 'green');
        const greenBarPosition = parseFloat(selectedResult.top / (document.body.scrollHeight - window.innerHeight)) * 100;
        highlightElement.style.top = `${greenBarPosition - 5}%`; // Verschieben um 5% nach oben
        highlightElement.style.height = `2%`; // Längerer grüner Balken
        miniMapContainer.appendChild(highlightElement);
    }

    // Adding the red position bar to indicate the current scroll position
    const positionBar = document.createElement('div');
    positionBar.classList.add('bar', 'position-bar');
    miniMapContainer.appendChild(positionBar);

    function updatePositionBar() {
        const scrollPosition = (window.scrollY / (document.body.scrollHeight - window.innerHeight)) * 100;
        positionBar.style.top = `${Math.min(scrollPosition, 100)}%`;
    }

    document.addEventListener('scroll', () => {
        updatePositionBar();
    });
    updatePositionBar();
}

function endSearch() {
    window.location.href = window.location.pathname;
}

// Make the modal draggable
dragElement(document.getElementById('searchAssistantModal'));

function dragElement(elmnt) {
    var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
    elmnt.onmousedown = dragMouseDown;

    function dragMouseDown(e) {
        e = e || window.event;
        e.preventDefault();
        pos3 = e.clientX;
        pos4 = e.clientY;
        document.onmouseup = closeDragElement;
        document.onmousemove = elementDrag;
    }

    function elementDrag(e) {
        e = e || window.event;
        e.preventDefault();
        pos1 = pos3 - e.clientX;
        pos2 = pos4 - e.clientY;
        pos3 = e.clientX;
        pos4 = e.clientY;
        elmnt.style.top = (elmnt.offsetTop - pos2) + 'px';
        elmnt.style.left = (elmnt.offsetLeft - pos1) + 'px';
    }

    function closeDragElement() {
        document.onmouseup = null;
        document.onmousemove = null;
    }
}

function toggleSearchAssistant() {
    const searchAssistantModal = document.getElementById('searchAssistantModal');
    const searchAssistantModalToggle = document.getElementById('searchAssistantModalToggle');
    if (searchAssistantModal.classList.contains('open')) {
        searchAssistantModal.classList.remove('open');
        searchAssistantModalToggle.classList.remove('open');
    } else {
        searchAssistantModal.classList.add('open');
        searchAssistantModalToggle.classList.add('open');
    }
}




</script>



</body>
</html>
