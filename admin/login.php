<?php

$email = $_POST['email'];
$password = $_POST['password'];

$host = "localhost";
$userdb = "root";
$pswdb = "";
$nomedb = "corsoweb";

$conn = new mysqli($host, $userdb, $pswdb, $nomedb);

$query = "SELECT * FROM utenti WHERE email='$email'";

$risultati = $conn -> query($query);

// var_dump($risultati);

if ( $risultati -> num_rows > 0 ){

    while( $riga = $risultati -> fetch_assoc() ){

        if (password_verify($password,$riga['password']) ) {
            echo "yes";
        } else {
            echo "Non puoi accedere";
        }

    }

} else {
    echo "Email non trovata";
}

?>