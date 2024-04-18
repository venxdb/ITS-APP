<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weekly Schedule</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="schedule-container">
        <h2>Weekly Schedule</h2>
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
