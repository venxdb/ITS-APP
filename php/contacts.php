<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contatti</title>
    <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/nav-style.css">
        <link rel="stylesheet" href="../css/coord-style.css">
        <link rel="stylesheet" href="../css/footer-style.css">
</head>
<body>
<?php include 'nav.php' ?>
    <div class="contacts-container">
        <h2>Contatti</h2>
        <h3>Contatta un Professore</h3>
        <form action="send_message_to_professor.php" method="post">
            <label for="message_professor">Messaggio:</label>
            <textarea name="message_professor" id="message_professor" required></textarea>
            <button type="submit">Invia</button>
        </form>
        <h3>Contatta un Coordinatore</h3>
        <form action="send_message_to_coordinator.php" method="post">
            <label for="message_coordinator">Messaggio:</label>
            <textarea name="message_coordinator" id="message_coordinator" required></textarea>
            <button type="submit">Invia</button>
        </form>
    </div>
    <?php include 'footer.php'; ?>

</body>
</html>
