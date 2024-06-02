<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    $security_answer = htmlspecialchars($_POST['security-answer']);

    // Validate the security question
    if ($security_answer === '8') {
        // Send the email
        $to = "kontakt@netfusionit.de";
        $headers = "From: $email" . "\r\n" .
                   "Reply-To: $email" . "\r\n" .
                   "X-Mailer: PHP/" . phpversion();
        $email_message = "Name: $name\nEmail: $email\nSubject: $subject\nMessage:\n$message";
        
        if (mail($to, $subject, $email_message, $headers)) {
            // Send confirmation email to the sender
            $confirmation_subject = "Bestätigung Ihrer Kontaktanfrage";
            $confirmation_message = "Vielen Dank, $name, dass Sie uns kontaktiert haben. Wir haben Ihre Nachricht erhalten und melden uns schnellstmöglich zurück.\n\nMit freundlichen Grüßen,\nIhr Team von NetFusion IT";
            $confirmation_headers = "From: kontakt@netfusionit.de" . "\r\n" .
                                    "Reply-To: kontakt@netfusionit.de" . "\r\n" .
                                    "X-Mailer: PHP/" . phpversion();

            mail($email, $confirmation_subject, $confirmation_message, $confirmation_headers);

            echo "Ihre Nachricht wurde gesendet. Vielen Dank!";
        } else {
            echo "Fehler beim Senden der Nachricht.";
        }
    } else {
        echo "Ungültige Sicherheitsantwort.";
    }
}
?>
