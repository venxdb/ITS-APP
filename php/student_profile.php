<?php
// Includi il file di controllo di accesso
include_once 'backend/access_control.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/nav-style.css">
        <link rel="stylesheet" href="../css/coord-style.css">
        <link rel="stylesheet" href="../css/footer-style.css">
    </head>
<body>
<?php include 'nav.php' ?>
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

        // Query per recuperare le informazioni dello studente
        $student_id = $_SESSION['student_id']; // Supponiamo che l'id dello studente sia memorizzato nella sessione
        $sql = "SELECT nome, cognome, foto_profilo, orario_lezioni FROM users ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          echo "<div class='titolo'>
            <img src='../img/prof-icn.svg' alt='Icona Professore' class='icn'>
            <h2>" .
            $row["nome"] . 
            " " . 
            $row["cognome"] .
             "</h2></div>";
            echo
             "<div id='rettangolo1' class='gestione-coord'>
             <img src='data:image/png;base64," . 
             base64_encode($row['foto_profilo']) .
            "' alt='Foto Profilo' id='foto-prof'><div id='gestione-coord'>
              <ul>
              <li><a href='#0'>Il tuo account</a></li>
             <li> <a href='#0'>Impostazioni</a></li>
             <li> <a href='./login.php'>Esci </li></a>
             </ul>
            </div></div>";

            echo "<div id='orario-prof'>
            <h3>Orario delle lezioni settimanali:</h3>
            <div id='rettangolo2'>";
            echo "<p>" . 
            $row["orario_lezioni"] . 
            "</p></div></div>";
            echo "Nessuna informazione trovata.";
        }
        $conn->close();
        ?>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
