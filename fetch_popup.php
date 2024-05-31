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

session_start();
if ($show_popup) {
    // Prüfen, ob das Popup bereits in dieser Sitzung angezeigt wurde
    if (isset($_SESSION['last_popup_time'])) {
        $last_popup_time = $_SESSION['last_popup_time'];
        $current_time = time();
        $time_diff = ($current_time - $last_popup_time) / 3600; // Unterschied in Stunden

        if ($time_diff >= 4) {
            $_SESSION['last_popup_time'] = $current_time;
            echo $popup_message;
        }
    } else {
        $_SESSION['last_popup_time'] = time();
        echo $popup_message;
    }
}
?>
