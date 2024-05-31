<?php
include 'db.php';

$ticker_message = '';

// Überprüfen, ob eine Ticker-Meldung vorhanden ist
$sql = "SELECT * FROM ticker_messages ORDER BY created_at DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $ticker = $result->fetch_assoc();
    $ticker_message = $ticker['content'];
}

$conn->close();

session_start();
if ($ticker_message) {
    // Prüfen, ob die Ticker-Meldung bereits in dieser Sitzung angezeigt wurde
    if (isset($_SESSION['last_ticker_time'])) {
        $last_ticker_time = $_SESSION['last_ticker_time'];
        $current_time = time();
        $time_diff = ($current_time - $last_ticker_time) / 3600; // Unterschied in Stunden

        if ($time_diff >= 4) {
            $_SESSION['last_ticker_time'] = $current_time;
            echo $ticker_message;
        }
    } else {
        $_SESSION['last_ticker_time'] = time();
        echo $ticker_message;
    }
}
?>
