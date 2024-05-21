<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/nav-style.css">
        <link rel="stylesheet" href="../css/coord-style.css">
        <link rel="stylesheet" href="../css/footer-style.css">
</head>
<body>
    <div class="dashboard-container">
        <h2>Dashboard</h2>
        <div class="notification-list">
            <h3>Notifiche:</h3>
            <?php
            // Connessione al database
            $servername = "localhost";
            $username = "itsapp";
            $password = "password";
            $dbname = "my_itsapp";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verifica della connessione
            if ($conn->connect_error) {
                die("Connessione fallita: " . $conn->connect_error);
            }

            // Query per recuperare le notifiche
            $sql = "SELECT * FROM notifiche";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output delle notifiche
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='notification'>";
                    echo "<p><strong>Da:</strong> " . $row["mittente"] . "</p>";
                    echo "<p><strong>Data:</strong> " . $row["data"] . "</p>";
                    echo "<p><strong>Messaggio:</strong> " . $row["messaggio"] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "Nessuna notifica trovata.";
            }
            $conn->close();
            ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>

</body>
</html>
