<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profilo Professore</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php include 'nav.php'; ?>    

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
            echo "<div class='titolo'>
            <img src='../img/prof-icn.svg' alt='Icona Professore' class='icn'>
            <h2>" .
            $row["nome"] . 
            " " . $row["cognome"] .
             "</h2></div>";
            echo
             "<div id='rettangolo1'><img src='data:image/png;base64," . base64_encode($row['foto_profilo']) .
              "' alt='Foto Profilo' id='foto-prof'><div id='link-prof'><a href='#0'>Il tuo account</a><a href='#0'>Impostazioni</a><a href='#0'>Esci</a></div></div>";
            
            echo "<div id='orario-prof'><h3>Orario delle lezioni settimanali:</h3><div id='rettangolo2'>";
            echo "<p>" . $row["orario_lezioni"] . "</p></div></div>";
        } else {
            echo "Nessuna informazione trovata.";
        }
        $conn->close();
        ?>
        <div id='contatta-coord'>
         <h3>Contatta un Coordinatore</h3>
        <form action="send_message_to_coordinator.php" method="post">
            <label for="message_coordinator">Messaggio:</label>
            <textarea name="message_coordinator" id="message_coordinator" required></textarea>
            <button type="submit" id="bottone">Invia</button>
        </form>
        </div>
    </div>
     
</body>
</html>
