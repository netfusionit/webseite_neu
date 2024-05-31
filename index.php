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
    <div class="alert alert-primary" role="alert">
        Willkommen bei NetFusionIT! <br>
        Unsere Webseite befindet sich derzeit im Aufbau!
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
    
    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section">
        <div class="container">
            <div class="row gy-4">
                <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item d-flex">
                        <div class="icon flex-shrink-0"><i class="bi bi-briefcase"></i></div>
                        <div>
                            <h4 class="title"><a href="#" class="stretched-link">Lorem Ipsum</a></h4>
                            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item d-flex">
                        <div class="icon flex-shrink-0"><i class="bi bi-card-checklist"></i></div>
                        <div>
                            <h4 class="title"><a href="#" class="stretched-link">Dolor Sitema</a></h4>
                            <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip exa</p>
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
    <section id="about" class="about section mt-5">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                    <p class="who-we-are">Who We Are</p>
                    <h3>Unleashing Potential with Creative Strategy</h3>
                    <p class="fst-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliqua.
                    </p>
                    <ul>
                        <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></li>
                        <li><i class="bi bi-check-circle"></i> <span>Duis aute irure dolor in reprehenderit in voluptate velit.</span></li>
                        <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</span></li>
                    </ul>
                    <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
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
    <section id="features" class="features section">
        <div class="container section-title" data-aos="fade-up">
            <h2 class="text-center">Features</h2>
            <p class="text-center">Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5 d-flex align-items-center">
                    <ul class="nav nav-tabs flex-column" data-aos="fade-up" data-aos-delay="100">
                        <li class="nav-item">
                            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                                <i class="bi bi-binoculars"></i>
                                <div>
                                    <h4>Modi sit est dela pireda nest</h4>
                                    <p>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                                <i class="bi bi-box-seam"></i>
                                <div>
                                    <h4>Unde praesenti mara setra le</h4>
                                    <p>Recusandae atque nihil. Delectus vitae non similique magnam molestiae sapiente similique tenetur aut voluptates sed voluptas ipsum voluptas</p>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
                                <i class="bi bi-brightness-high"></i>
                                <div>
                                    <h4>Pariatur explica nitro dela</h4>
                                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum Debitis nulla est maxime voluptas dolor aut</p>
                                </div>
                            </a>
                        </li>
                    </ul><!-- End Tab Nav -->
                </div>
                <br>
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
    <br>
    <br>
    <br>
    <!-- Features Details Section -->
    <section id="features-details" class="features-details section">
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
            <br>
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
    <section id="services" class="services section">
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
    <section id="blog" class="blog section">
  <div class="container mt-5">
        <h1>Blog</h1>
        <div class="row gy-4">
            <?php
            include 'db.php';
            $result = $conn->query("SELECT * FROM blog_posts ORDER BY created_at DESC");
            while ($row = $result->fetch_assoc()) {
                echo "<div class='col-lg-4' data-aos='fade-up' data-aos-delay='100'>";
                echo "<div class='blog-item position-relative'>";
                echo "<img src='uploads/" . $row['image'] . "' class='img-fluid' alt=''>";
                echo "<h3><a href='blog-details.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></h3>";
                echo "<p>" . substr($row['content'], 0, 100) . "...</p>";
                echo "<a href='blog-details.php?id=" . $row['id'] . "' class='read-more'>Read More <i class='bi bi-arrow-right'></i></a>";
                echo "<div class='reaction'>";
                echo "<span class='emoji' data-reaction='like'>👍</span>";
                echo "<span class='emoji' data-reaction='love'>❤️</span>";
                echo "<span class='emoji' data-reaction='wow'>😮</span>";
                echo "<span class='emoji' data-reaction='sad'>😢</span>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
    </section><!-- /Blog Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Contact</h2>
            <p>Get in touch with us</p>
        </div>
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="info-item">
                        <i class="bi bi-geo-alt"></i>
                        <h3>Our Address</h3>
                        <p>A108 Adam Street, New York, NY 535022</p>
                    </div>
                    <div class="info-item">
                        <i class="bi bi-envelope"></i>
                        <h3>Email Us</h3>
                        <p>info@example.com</p>
                    </div>
                    <div class="info-item">
                        <i class="bi bi-phone"></i>
                        <h3>Call Us</h3>
                        <p>+1 5589 55488 55</p>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <form action="send_email.php" method="post" class="php-email-form">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section><!-- /Contact Section -->

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
    <script src="assets/js/main.js"></script>
</body>
</html>
