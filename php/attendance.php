<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
    <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/nav-style.css">
        <link rel="stylesheet" href="../css/coord-style.css">
        <link rel="stylesheet" href="../css/footer-style.css">
</head>
<body>
<?php include 'nav.php' ?>
    <div class="attendance-container">
        <h2>Attendance</h2>
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

        // Query per recuperare l'elenco degli studenti
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Nome</th><th>Cognome</th><th>Presenza</th></tr>";
            // Output dell'elenco degli studenti
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["nome"] . "</td>";
                echo "<td>" . $row["cognome"] . "</td>";
                echo "<td><input type='checkbox' name='presenza' value='" . $row["id"] . "'></td>"; // Checkbox per segnare la presenza
                echo "</tr>";
            }
            echo "</table>";
            echo "<button type='button' onclick='registraPresenze()'>Registra Presenze</button>"; // Pulsante per registrare le presenze
        } else {
            echo "Nessuno studente trovato.";
        }
        $conn->close();
        ?>

        <!-- Script JavaScript per registrare le presenze -->
        <script>
            function registraPresenze() {
                var checkboxes = document.querySelectorAll('input[name="presenza"]:checked');
                var studentIds = [];
                checkboxes.forEach(function(checkbox) {
                    studentIds.push(checkbox.value);
                });
                // Invia i dati al server per registrare le presenze (utilizza AJAX o un semplice form submit)
            }
        </script>
    </div>
</body>
</html>
