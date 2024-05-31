<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Administrator erfolgreich registriert";
    } else {
        echo "Fehler: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrierung</title>
</head>
<body>
    <form action="register.php" method="post">
        <label for="username">Benutzername:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Passwort:</label>
        <input type="password" id="password" name="password" required><br>
        <button type="submit">Registrieren</button>
    </form>
</body>
</html>
