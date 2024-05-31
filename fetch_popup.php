<?php
include 'db.php';

$show_popup = false;
$popup_message = '';

// Überprüfen, ob ein Popup angezeigt werden soll
$sql = "SELECT * FROM popup_messages ORDER BY created_at DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $popup = $result->fetch_assoc();
    $popup_message = $popup['content'];
    $show_popup = true;
}

$conn->close();

