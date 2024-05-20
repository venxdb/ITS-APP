<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profilo Coordinatore - ITSAPP</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/nav-style.css">
    <link rel="stylesheet" href="../css/coord-style.css">
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
        $coordinatore_id = $_SESSION['coordinatore_id']; // Supponiamo che l'id del professore sia memorizzato nella sessione
        $sql = "SELECT nome, cognome, foto_profilo, orario_lezioni FROM coordinatori";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // Output dei dati del professore
            $row = $result->fetch_assoc();
            echo "<div class='titolo'>
            <img src='../img/coordinatore-icn.svg' alt='Icona Professore' class='icn'>
            <h2>" .
            $row["nome"] . 
            " " . $row["cognome"] .
             "</h2></div>";
            echo
             "<div id='rettangolo1' class='gestione-coord'>
             <img src='data:image/png;base64," . base64_encode($row['foto_profilo']) .
              "' alt='Foto Profilo' id='foto-prof'><div id='gestione-coord'>
              <ul>
              <li><a href='#0'>Il tuo account</a></li>
             <li> <a href='#0'>Impostazioni</a></li>
             <li> <a href='#0'>Esci</a> </li>
             </ul>
              </div>";
        } else {
            echo "Nessuna informazione trovata.";
        }
        ?>
         <ul class="gestione-coord">
            <li><a href='manage_students.php'>Gestisci Studenti</a></li>
            <li><a href='manage_professors.php'>Gestisci Professori</a></li>
            <li><a href='manage_permissions.php'>Gestisci Autorizzazioni</a></li>
        </ul>
    </div></div>
</body>
</html>
