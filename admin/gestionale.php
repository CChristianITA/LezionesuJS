<?php


if ($_SERVER ['REQUEST_METHOD']=== 
'GET'&& !isset($_SERVER
['HTTP_REFERER'])){

  die("Non Puoi Accedere");
} 









$host = "localhost";
$userdb = "root";
$pswdb = "";
$nomedb = "corsoweb";
$conn = new mysqli($host, $userdb, $pswdb, $nomedb);

$query = "SELECT * FROM utenti";

$risultati = $conn -> query($query);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gestionale</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
      defer
    ></script>
    <script src="assets/js/gestionale.js" defer></script>
  </head>
  <body>
    <main>
      <section id="gestionale">
        <div class="container">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                <th scope="col">Password</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              if ( $risultati -> num_rows > 0 ){

                while( $riga = $risultati -> fetch_assoc() ){
            
                    echo '<tr>
      <th scope="row">'.$riga['id'].'</th>
      <td colspan="1">'.$riga['nome'].'</td>
      <td>'.$riga['cognome'].'</td>
      <td>'.$riga['email'].'</td>
      <td><button class="btn btn-danger" type="button">Cancella</button></td>
      <td><button class="btn btn-warning" type="button">Modifica</button></td>

    </tr>';
            
                }
            
            } else {
                echo "Non ci sono dati";
            }
              ?>
            </tbody>
          </table>
        </div>
      </section>
    </main>
  </body>
</html>

