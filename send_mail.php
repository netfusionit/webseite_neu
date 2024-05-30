<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $vorname = $_POST['vorname'];
    $telefon = $_POST['telefon'];
    $email = $_POST['email'];
    $betreff = $_POST['betreff'];
    $nachricht = $_POST['nachricht'];

    $to = "kontakt@netfusionit.de";
    $subject = $betreff;
    $message = "Name: $name\nVorname: $vorname\nTelefon: $telefon\nE-Mail: $email\n\nNachricht:\n$nachricht";
    $headers = "From: $email";

    if (mail($to, $subject, $message, $headers)) {
        echo "Nachricht erfolgreich gesendet.";
    } else {
        echo "Nachricht konnte nicht gesendet werden.";
    }
}
?>
