<?php

$host = "localhost";
$userdb ="root";
$pswdb = "";
$nomedb = "corsoweb";

$conn = new mysqli ($host, $userdb, $pswdb, $nomedb);

$id = $_GET["id"];
$query = "DELETE FROM utenti WHERE id=$id";


if ($conn -> query($query)){
 echo"Il Dato e Stato Cancellato";
}
else{
echo"Il Dato Non e Stato Cancellato";
}

?>