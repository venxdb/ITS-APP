<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profilo Professore</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <nav>
        <div ><div id="cornice" ><a href="#0">Home</a></div></div>
        <div><a href="#0">Avvisi</a></div>
        <div><a href="#0">Registro</a></div>
        <div><a href="#0">Orari</a></div>
        <div><a href="#0">Materiali</a></div>
    </nav>
    <div class="profile-container">
        
        <?php
        session_start();

        // Connessione al database
        $user = 'root';
        $password = 'root';
        $db = 'itsapp';
        $host = 'localhost';
        $port = 3306;

        $conn = new mysqli($host, $user, $password, $db, $port);
        // Verifica della connessione
        if ($conn->connect_error) {
            die("Connessione fallita: " . $conn->connect_error);
        }

        // Query per recuperare le informazioni del professore
        $professor_id = $_SESSION['professor_id']; // Supponiamo che l'id del professore sia memorizzato nella sessione
        $sql = "SELECT nome, cognome, foto_profilo, orario_lezioni FROM professori";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // Output dei dati del professore
            $row = $result->fetch_assoc();
            echo "<div class='titolo'><img src='../img/prof-icn.svg' alt='Icona Professore' class='icn'><h2>" . $row["nome"] . " " . $row["cognome"] . "</h2></div>";
            echo "<div id='rettangolo1'><img src='data:image/png;base64," . base64_encode($row['foto_profilo']) . "' alt='Foto Profilo' id='foto-prof'><div id='link-prof'><a href='#0'>Il tuo account</a><a href='#0'>Impostazioni</a><a href='#0'>Esci</a></div></div>";
            
            echo "<p>Orario delle lezioni settimanali:</p>";
            echo "<p>" . $row["orario_lezioni"] . "</p>";
        } else {
            echo "Nessuna informazione trovata.";
        }
        $conn->close();
        ?>

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
            <button type="submit">Invia</button>
        </form>
    </div>
</body>
</html>
