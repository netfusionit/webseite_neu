<?php
$servername = "localhost";
$username = "netfuweb";
$password = "netfuweb01";
$dbname = "netfusion_webseite";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
