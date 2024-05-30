<?php include 'includes/header.php'; ?>

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="img/placeholder.png" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>Netzwerktechnik</h5>
                <p>Optimale L�sungen f�r Ihr Netzwerk</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/placeholder.png" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>Webdesign</h5>
                <p>Kreative Webseiten mit WordPress</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/placeholder.png" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>Service & Support</h5>
                <p>Professionelle Unterst�tzung f�r Ihre IT</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </a>
</div>

<section class="my-5">
    <div class="container">
        <h2>Unsere Dienstleistungen</h2>
        <p>Wir bieten eine Vielzahl von IT-Dienstleistungen, darunter Netzwerktechnik, Webdesign und IT-Support.</p>
        <div class="row">
            <div class="col-md-4">
                <div class="service-card">
                    <h3>Netzwerktechnik</h3>
                    <p>Professionelle Netzwerkl�sungen f�r Unternehmen jeder Gr��e.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card">
                    <h3>Webdesign</h3>
                    <p>Kreative und funktionale Websites, die beeindrucken.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card">
                    <h3>Service & Support</h3>
                    <p>Umfassende Unterst�tzung und Wartung Ihrer IT-Infrastruktur.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="my-5">
    <div class="container">
        <h2>Warum uns w�hlen?</h2>
        <div class="row">
            <div class="col-md-6">
                <p>Wir bieten ma�geschneiderte L�sungen f�r Ihre spezifischen Bed�rfnisse. Unser Team von Experten steht Ihnen zur Seite, um sicherzustellen, dass Ihre IT-Systeme reibungslos funktionieren.</p>
                <ul>
                    <li>Erfahrenes und kompetentes Team</li>
                    <li>Individuelle Beratung und Planung</li>
                    <li>Schneller und zuverl�ssiger Support</li>
                    <li>Kosteneffiziente L�sungen</li>
                </ul>
            </div>
            <div class="col-md-6">
                <img src="img/placeholder.png" class="img-fluid" alt="Warum uns w�hlen">
            </div>
        </div>
    </div>
</section>

<section class="my-5">
    <div class="container">
        <h2>Kundenmeinungen</h2>
        <div id="testimonials" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="testimonial">
                        <p>"NetFusion hat unser Netzwerk auf ein neues Level gebracht. Die Zusammenarbeit war professionell und reibungslos."</p>
                        <h5>John Doe, CEO von Tech Solutions</h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="testimonial">
                        <p>"Dank NetFusion haben wir eine fantastische neue Website, die unsere Kunden begeistert. Der Support ist erstklassig."</p>
                        <h5>Jane Smith, Marketing Manager bei Creative Designs</h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="testimonial">
                        <p>"Die IT-Support-Dienstleistungen von NetFusion sind hervorragend. Sie sind immer schnell zur Stelle und l�sen Probleme effizient."</p>
                        <h5>Mark Johnson, IT-Leiter bei Business Corp</h5>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#testimonials" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#testimonials" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>
</section>

<section class="my-5">
    <div class="container">
        <h2>Aktuelles aus unserem Blog</h2>
        <?php
        include 'includes/db.php';
        $sql = "SELECT * FROM blog_posts ORDER BY created_at DESC LIMIT 3";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<div class="row">';
            while($row = $result->fetch_assoc()) {
                echo "<div class='col-md-4'>";
                echo "<div class='blog-post'>";
                echo "<h3>" . $row['title'] . "</h3>";
                echo "<p>" . substr($row['content'], 0, 200) . "...</p>";
                echo "<a href='post.php?id=" . $row['id'] . "' class='btn btn-primary'>Weiterlesen</a>";
                echo "</div>";
                echo "</div>";
            }
            echo '</div>';
        } else {
            echo "<p>Noch keine Blogeintr�ge vorhanden.</p>";
        }

        $conn->close();
        ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
