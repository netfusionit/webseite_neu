<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    $recaptcha_response = $_POST['g-recaptcha-response'];

    // Verify the reCAPTCHA response
    $recaptcha_secret = '6LfSEO8pAAAAANZXUqi4cQm64B9f7RXZUMpDTTjB';
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_data = array(
        'secret' => $recaptcha_secret,
        'response' => $recaptcha_response
    );

    $options = array(
        'http' => array(
            'header'  => "Content-Type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($recaptcha_data),
        ),
    );

    $context  = stream_context_create($options);
    $result = file_get_contents($recaptcha_url, false, $context);
    $response = json_decode($result, true);

    if ($response['success'] === true) {
        // reCAPTCHA was successfully validated
        $to = "kontakt@netfusionit.de";
        $headers = "From: $email" . "\r\n" .
                   "Reply-To: $email" . "\r\n" .
                   "X-Mailer: PHP/" . phpversion();
        $email_message = "Name: $name\nEmail: $email\nSubject: $subject\nMessage:\n$message";
        
        if (mail($to, $subject, $email_message, $headers)) {
            echo "Ihre Nachricht wurde gesendet. Vielen Dank!";
        } else {
            echo "Fehler beim Senden der Nachricht.";
        }
    } else {
        echo "Ungültige reCAPTCHA-Bestätigung.";
    }
}
?>
