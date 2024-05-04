<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Weekly Schedule</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <?php include 'nav.php'; ?>    
        
        <div class="schedule-container">
            <h2>Weekly Schedule</h2>
            
            <!-- Form per modificare l'orario delle lezioni -->
            <form action="update_schedule.php" method="post">
                <h3>Modifica Orario Lezioni</h3>
                <label for="orario_lezioni">Orario Lezioni:</label>
                <textarea name="orario_lezioni" id="orario_lezioni"></textarea>
                <button type="submit">Salva</button>
            </form>
            
            <!-- Form per inviare notifiche -->
            <form action="send_notification.php" method="post">
                <h3>Invia Notifica</h3>
                <label for="notifica">Messaggio:</label>
                <textarea name="notifica" id="notifica"></textarea>
                <button type="submit" id="bottone">Invia</button>
            </form>
        <?php
        $user = 'root';
        $password = 'root';
        $db = 'inventory';
        $host = 'localhost';
        $port = 3306;
        
        $link = mysqli_init();
        $success = mysqli_real_connect(
           $link,
           $host,
           $user,
           $password,
           $db,
           $port
        );

        // Verifica della connessione
        if ($conn->connect_error) {
            die("Connessione fallita: " . $conn->connect_error);
        }

        // Query per recuperare l'orario delle lezioni settimanali
        $sql = "SELECT * FROM orario_lezioni";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output dell'orario delle lezioni
            while ($row = $result->fetch_assoc()) {
                echo "<div class='lesson'>";
                echo "<p><strong>Giorno:</strong> " . $row["giorno"] . "</p>";
                echo "<p><strong>Ora:</strong> " . $row["ora"] . "</p>";
                echo "<p><strong>Materia:</strong> " . $row["materia"] . "</p>";
                echo "<p><strong>Argomento:</strong> " . $row["argomento"] . "</p>";
                echo "</div>";
            }
        } else {
            echo "Nessuna lezione trovata.";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
