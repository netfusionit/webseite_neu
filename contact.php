<?php include 'includes/header.php'; ?>

<section class="my-5">
    <div class="container">
        <h2>Kontaktieren Sie uns</h2>
        <form action="contact.php" method="post" class="contact-form">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">E-Mail:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Nachricht:</label>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div>
            <button type="submit">Senden</button>
        </form>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'includes/db.php';
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO contact_messages (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Nachricht erfolgreich gesendet');</script>";
    } else {
        echo "<script>alert('Fehler beim Senden der Nachricht');</script>";
    }

    $conn->close();
}
?>
