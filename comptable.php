<?php
session_start();

if(!isset($_SESSION['login'])) {
  echo 'Vous n\'êtes pas autorisé à acceder à cette zone';
  include('GSBIndex.php');
  exit;
}

require_once 'config.php';

$pdo = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);
?>

<html>
    <head>
        <title>Airplanes</title>
        <link href="css/css1.css" rel="stylesheet" type="text/css"/>
    </head>   
    <body>
        <header>    
  <ul>
    <li><a href="#1">Home</a></li>
    <li><a href="GSBIndex.php">GSB</a></li>
    <li><a href="#3">JS2 Project</a></li>
    <li><a href="#4">Labs</a></li>
    <li><a href="#5">Contact</a></li>
</ul>
        </header>
        <section>
            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="jquery.autocomplete.min.js"></script>
            
            <form action="comptableConsult.php" method="post" >
<style>
    .autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; }
.autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
.autocomplete-selected { background: #F0F0F0; }
.autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
</style>

<script type="text/javascript">
$(document).ready(function() {
    $('#guten2').autocomplete({
        serviceUrl: 'fichier2.php',
        dataType: 'json'
    });
});

</script>
<br>
  
Mois :  <input type="text" name="mois" id="guten2" >
     

<input type="submit" name="connexion" value="Consulter">
</form>
<form action="prenomRecherche.php" method="post">
<br>
  
Prenom :  
<?php                                                     
$req = $pdo->prepare("SELECT id, prenom FROM employe");
$req->execute();
echo "<SELECT NAME='id' onChange='FocusObjet()' style='width:150px;'>";
while ($donnees = $req->fetch())
echo "<OPTION VALUE='" . $donnees["id"] . "'>" . $donnees['prenom'] . "</OPTION>\n";                   
echo "</SELECT>";
?>
     
<input type="submit" name="connexion" value="Consulter">
    
</form>

<form action="nomRecherche.php" method="post">
  
<br>
  
Nom :  
<?php                                                     
$req = $pdo->prepare("SELECT id, nom FROM employe");
$req->execute();
echo "<SELECT NAME='id' onChange='FocusObjet()' style='width:150px;'>";
while ($donnees = $req->fetch())
echo "<OPTION VALUE='" . $donnees["id"] . "'>" . $donnees['nom'] . "</OPTION>\n";                   
echo "</SELECT>";
?>
     

<input type="submit" name="connexion" value="Consulter">
    
</form>


<center><h1>Fiche de Frais en attente</h1></center>
            <?php
            $req1 = $pdo->prepare("SELECT * FROM fiche_de_frais WHERE status='En_attente'");
            $req1->execute();
            
            
            echo "<table align='left' style='border-collapse: collapse; color:white; margin-left: 220px;'>";
    echo "<tr><th style='border: 1px solid black;'>ID Fiche</th>"
    . "<th style='border: 1px solid black;'>ID Visteur</th>"
    . "<th style='border: 1px solid black;'>Mois</th>"
    . "<th style='border: 1px solid black;'>Date de modification</th>"
    . "<th style='border: 1px solid black;'>Status</th></tr>";

    while ($donnees1 = $req1->fetch()) {
        echo "<tr><td style='border: 1px solid black;'>" . $donnees1['idfiche'] .                
                "</td><td style='border: 1px solid black;'>" . $donnees1['id_visiteur'] .
                "</td><td style='border: 1px solid black;'>" . $donnees1['mois'] . 
                "</td><td style='border: 1px solid black;'>" . $donnees1['date_de_modif'] . 
                "</td><td style='border: 1px solid black;'>" . $donnees1['status'] . "</tr> <br>";                    
    }
    echo "</table>";
            
            ?>
<br><br><br>
<div id="suivie">
<input type="button" value="Suivi des Fiches de Frais" onClick="javascript:document.location.href='suivi.php'" />
</div>

            
        </section>
        
        <footer>
            
        </footer>
                
    </body>
</html>

