<?php
$nome = htmlspecialchars($_POST['nome']);
$cognome = htmlspecialchars($_POST['cognome']);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);  
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$host = "localhost";
$userdb = "root";
$pswdb = "";
$nomedb = "corsoweb";

$conn = new mysqli($host, $userdb, $pswdb, $nomedb);

$query = "CREATE TABLE IF NOT EXISTS utenti(
id INT(3) AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(30) NOT NULL,
cognome VARCHAR(50) NOT NULL,
email VARCHAR(255) NOT NULL UNIQUE,
password VARCHAR(255) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn -> query($query) === FALSE ) {
    die( '<div class="alert alert-success" role="alert">
  TABELLA NON CREATA
</div>');
} 

$query = "INSERT INTO utenti (nome, cognome, email, password) VALUES ('$nome','$cognome','$email', '$password')";

if ( $conn -> query($query) === TRUE ) {
    die( '<div class="mt-5 alert alert-success" role="alert">
  TI SEI REGISTRATO CON SUCCESSO
</div>');
} 

?>