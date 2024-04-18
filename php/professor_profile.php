<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professor Profile</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/prof.css">
</head>
<body>
    <nav>
        
        <div><a id="cornice" href="#0">Home</a></div>
       <div><a href="#0">avvisi</a></div>
       <div><a href="#0">registro</a></div>
       <div><a href="#0">materiali</a></div>
    </nav>
  
    <div class="profile-container">
        <img src="/img/logoc.svg" alt="">
        <?php
        session_start();

        
        // Connessione al database
        $servername = "localhost";
        $username = "itsapp";
        $password = "password";
        $dbname = "itsapp";

        $conn = new mysqli($servername, $username, $password, $dbname);

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
            echo "<p >Nome: " . $row["nome"] . "</p>";
            echo "<p>Cognome: " . $row["cognome"] . "</p>";
           echo "<img  src='data:image/png;base64,".base64_encode($row['foto_profilo'])."' alt='Foto Profilo'>";
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
