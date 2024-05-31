<?php
if (isset($_GET['image'])) {
    $image = $_GET['image'];
    $file_path = 'uploads/' . $image;
    
    if (file_exists($file_path)) {
        unlink($file_path);
        echo "Bild wurde gelöscht.";
    } else {
        echo "Bild nicht gefunden.";
    }
    header("Location: admin.php");
    exit;
}
?>
