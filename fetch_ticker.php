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

if (!empty($ticker_message)) {
    echo $ticker_message;
}
?>
