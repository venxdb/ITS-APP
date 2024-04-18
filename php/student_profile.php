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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="profile-container">
        <h1>Profilo Studente</h1>
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
            // Output dei dati dello studente
            $row = $result->fetch_assoc();
            echo "<h3>Nome: " . $row["nome"] . "</h3>";
            echo "<h3>Cognome: " . $row["cognome"] . "</h3>";
            echo "<img  src='data:image/png;base64,".base64_encode($row['foto_profilo'])."' alt='Foto Profilo'>";
            echo "<p>Orario delle lezioni settimanali:</p>";
            echo "<p>" . $row["orario_lezioni"] . "</p>";
        } else {
            echo "Nessuna informazione trovata.";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
