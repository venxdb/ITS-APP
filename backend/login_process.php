<?php
// Includi il file di controllo di accesso
include_once 'access_control.php';

session_start();

// Connessione al database
$user = 'root';
$password = 'root';
$db = 'itsapp';
$host = 'localhost';




$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Verifica delle credenziali
$username = $_POST['username'];
$password = $_POST['password'];


// Query per il login dell'utente (tabella professori)
$sql_professori = "SELECT * FROM professori WHERE username='$username' AND password='$password'";
$result_professori = $conn->query($sql_professori);

// Query per il login degli studenti
$sql_users = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result_users = $conn->query($sql_users);

// Query per il login degli coordinatori
$sql_coordinatori = "SELECT * FROM coordinatori WHERE username='$username' AND password='$password'";
$result_coordinatori = $conn->query($sql_coordinatori);

// Verifica se l'utente è presente nella tabella professori
if ($result_professori->num_rows > 0) {
    // Utente trovato nella tabella professori
    header("Location: ../professor_profile.php");
    exit;
} elseif ($result_users->num_rows > 0) {
    // Utente trovato nella tabella studenti
    header("Location: ../student_profile.php");
    exit;
} elseif ($result_coordinatori->num_rows > 0) {
    // Utente trovato nella tabella coordinatori
    header("Location: ../coordinator_profile.php");
    exit;
} else {
    // Utente non trovato in nessuna delle tabelle
    echo "Credenziali non valide";
}

$conn->close();
?>