<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakt - NetFusionIT</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container mt-5">
        <h1>Kontaktieren Sie uns</h1>
        <form action="send_email.php" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="vorname">Vorname</label>
                <input type="text" class="form-control" id="vorname" name="vorname" required>
            </div>
            <div class="form-group">
                <label for="telefon">Telefon</label>
                <input type="text" class="form-control" id="telefon" name="telefon" required>
            </div>
            <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="betreff">Betreff</label>
                <input type="text" class="form-control" id="betreff" name="betreff" required>
            </div>
            <div class="form-group">
                <label for="nachricht">Nachricht</label>
                <textarea class="form-control" id="nachricht" name="nachricht" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Senden</button>
        </form>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
