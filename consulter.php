
<div id="Administration1">
    <a href="GSBIndexP.php"><h2>Back</h2></a>
        </div>

<div id="Administration1">
    <a href="logout.php"><h2>Logout</h2></a>
        </div>

<?php
session_start();


if(!isset($_SESSION['login'])) {
  echo 'Vous n\'êtes pas autorisé à acceder à cette zone';
  header('Location: GSBIndex.php');  
}
?>

<?php
require_once 'config.php';

$pdo = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);

if (empty($_POST['mois']))
{
   header('Location: GSBIndexP.php');  
}
else {
   $mois = $_POST['mois']; 
}



?>


<html>
    <head>
        <title>Airplanes</title>
        <link href="css/css1.css" rel="stylesheet" type="text/css"/>
    </head>   
    <body>
        <header>    
  <ul>
    
    <li><a href="#">GSB</a></li>
    
</ul>
        </header>
        <section>
            <br>
            
            <h1><center>Page de consulation des fiches de frais</center></h1>
            <div id="table" style="position: absolute; left: 430px;">  <?php
            $req1 = $pdo->prepare("SELECT id_visiteur, mois, montant_total, date_de_modif, remboursement_total FROM fiche_de_frais WHERE mois= :moisT");
    $req1->bindParam(':moisT', $mois);
    $req1->execute();
    echo "<table align='center' style='border-collapse: collapse; color:white; margin-left: 130px;'>";
    echo "<tr><th style='border: 1px solid black;'>ID Visiteur</th>"
    . "<th style='border: 1px solid black;'>Mois</th>"
    . "<th style='border: 1px solid black;'>Montant Total</th>"
    . "<th style='border: 1px solid black;'>Date de modification</th>"
    . "<th style='border: 1px solid black;'>Type</th></tr>";

    while ($donnees1 = $req1->fetch()) {
        echo "<tr><td style='border: 1px solid black;'>" . $donnees1['id_visiteur'] .                
                "</td><td style='border: 1px solid black;'>" . $donnees1['mois'] .
                "</td><td style='border: 1px solid black;'>" . $donnees1['montant_total'] . 
                "</td><td style='border: 1px solid black;'>" . $donnees1['date_de_modif'] . 
                "</td><td style='border: 1px solid black;'>" . $donnees1['remboursement_total'] .
                "</td></tr> <br>";                    
    }
    echo "</table>";
                        

    ?></div>
        </section>
        
        <footer>
            
        </footer>
                
    </body>
</html>