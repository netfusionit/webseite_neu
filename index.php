<?php include 'includes/header.php'; ?>

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="img/networking.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>Netzwerktechnik</h5>
                <p>Optimale Lösungen für Ihr Netzwerk</p>
                <button class="btn btn-primary animated-button" onclick="showPopup('netzwerkPopup')">Mehr erfahren</button>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/webdesign.jpg" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>Webdesign</h5>
                <p>Kreative Webseiten mit WordPress</p>
                <button class="btn btn-primary animated-button" onclick="showPopup('webdesignPopup')">Mehr erfahren</button>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/support.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>Service & Support</h5>
                <p>Professionelle Unterstützung für Ihre IT</p>
                <button class="btn btn-primary animated-button" onclick="showPopup('supportPopup')">Mehr erfahren</button>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Vorherige</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Nächste</span>
    </a>
</div>

<section class="my-5 bg-light">
    <div class="container">
        <h2>Unsere Dienstleistungen</h2>
        <p>Wir bieten eine Vielzahl von IT-Dienstleistungen, darunter Netzwerktechnik, Webdesign und IT-Support.</p>
        <div class="row">
            <div class="col-md-3">
                <div class="service-card">
                    <h3>Netzwerktechnik</h3>
                    <p>Professionelle Netzwerklösungen für Unternehmen jeder Größe.</p>
                    <a href="netzwerktechnik.php" class="btn btn-primary">Mehr erfahren</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="service-card">
                    <h3>Webdesign</h3>
                    <p>Kreative und funktionale Websites, die beeindrucken.</p>
                    <a href="webdesign.php" class="btn btn-primary">Mehr erfahren</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="service-card">
                    <h3>Service & Support</h3>
                    <p>Umfassende Unterstützung und Wartung Ihrer IT-Infrastruktur.</p>
                    <a href="support.php" class="btn btn-primary">Mehr erfahren</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="service-card">
                    <h3>IT-Sicherheit</h3>
                    <p>Schützen Sie Ihr Unternehmen vor Cyber-Bedrohungen.</p>
                    <a href="it-security.php" class="btn btn-primary">Mehr erfahren</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="my-5">
    <div class="container">
        <h2>Warum uns wählen?</h2>
        <div class="row">
            <div class="col-md-6">
                <p>Wir bieten maßgeschneiderte Lösungen für Ihre spezifischen Bedürfnisse. Unser Team von Experten steht Ihnen zur Seite, um sicherzustellen, dass Ihre IT-Systeme reibungslos funktionieren.</p>
                <ul>
                    <li>Erfahrenes und kompetentes Team</li>
                    <li>Individuelle Beratung und Planung</li>
                    <li>Schneller und zuverlässiger Support</li>
                    <li>Kosteneffiziente Lösungen</li>
                </ul>
            </div>
            <div class="col-md-6">
                <img src="img/choose-us.jpg" class="img-fluid" alt="Warum uns wählen">
            </div>
        </div>
    </div>
</section>

<section class="my-5 bg-light">
    <div class="container">
        <h2>Kontaktieren Sie uns</h2>
        <form action="send_contact.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-Mail</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Nachricht</label>
                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Senden</button>
        </form>
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
                        <p>"Die IT-Support-Dienstleistungen von NetFusion sind hervorragend. Sie sind immer schnell zur Stelle und lösen Probleme effizient."</p>
                        <h5>Mark Johnson, IT-Leiter bei Business Corp</h5>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#testimonials" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Vorherige</span>
            </a>
            <a class="carousel-control-next" href="#testimonials" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Nächste</span>
            </a>
        </div>
    </div>
</section>

<section class="my-5 bg-light">
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
                echo "<img src='img/" . $row['image'] . "' class='img-fluid' alt='" . $row['title'] . "'>";
                echo "<h3>" . $row['title'] . "</h3>";
                echo "<p>" . substr($row['content'], 0, 200) . "...</p>";
                echo "<a href='post.php?id=" . $row['id'] . "' class='btn btn-primary'>Weiterlesen</a>";
                echo "</div>";
                echo "</div>";
            }
            echo '</div>';
        } else {
            echo "<p>Noch keine Blogeinträge vorhanden.</p>";
        }

        $conn->close();
        ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

<div id="netzwerkPopup" class="popup">
    <div class="popup-content">
        <span class="close" onclick="closePopup('netzwerkPopup')">&times;</span>
        <h2>Netzwerktechnik</h2>
        <p>Details über Netzwerktechnik...</p>
    </div>
</div>

<div id="webdesignPopup" class="popup">
    <div class="popup-content">
        <span class="close" onclick="closePopup('webdesignPopup')">&times;</span>
        <h2>Webdesign</h2>
        <p>Details über Webdesign...</p>
    </div>
</div>

<div id="supportPopup" class="popup">
    <div class="popup-content">
        <span class="close" onclick="closePopup('supportPopup')">&times;</span>
        <h2>Service & Support</h2>
        <p>Details über Service & Support...</p>
    </div>
</div>
