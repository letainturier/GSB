<?php
session_start();

if(!isset($_SESSION['login'])) {
  echo 'Vous n\'êtes pas autorisé à acceder à cette zone';
  include('GSBIndex.php');
  exit;
}

$id = $_SESSION['login'];


require_once 'config.php';

$pdo = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);
?>

<html>
    <head>
        <title>Airplanes</title>
        <link href="css/css1.css" rel="stylesheet" type="text/css"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head>   
    <body>
        <header> 
            <div id="Administration1">
    <a href="logout.php"><h2>Logout</h2></a>
        </div>
  <ul>
    
    <li><a href="#2">GSB</a></li>
    
</ul>
        </header>
        <section>
            
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="jquery.autocomplete.min.js"></script>

<form action="consulter.php" method="post" > 
<style>
.autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; }
.autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
.autocomplete-selected { background: #F0F0F0; }
.autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
</style>

<script type="text/javascript">
$(document).ready(function() {
    $('#guten').autocomplete({
        serviceUrl: 'fichier.php',
        dataType: 'json'
    });
});

</script>
<br>
<center style="font-weight: bold; color: white;">Bonjour vous êtes sur le compte de <?php echo $id; ?></center>

<br>

<center style="font-weight: bold;"> Date :  <input type="text" name="mois" id="guten" >
     

<input type="submit" name="connexion" value="Consulter"></center>
</form>

    <br>


<div id="table">  <?php
            $req1 = $pdo->prepare("SELECT idfiche, id_visiteur, mois, montant_total, date_de_modif, remboursement_total FROM fiche_de_frais");
    $req1->execute();
    
    ?>
    <form action='modifier.php' method='POST'>
    <?php                                                     
    $req = $pdo->prepare("SELECT idfiche FROM fiche_de_frais inner join employe on fiche_de_frais.id_visiteur = employe.id where login='$id' and (fiche_de_frais.status = 'En_cours' or fiche_de_frais.status = 'Refuser')");
    $req->execute();
    ?>
        <center style="font-weight: bold;"> Modification fiche n&ordm;
        <?php
    echo "<SELECT NAME='idfiche' onChange='FocusObjet()' style='width:150px;'>";
    while ($donnees = $req->fetch())
    echo "<OPTION VALUE='" . $donnees["idfiche"] . "'>". $donnees["idfiche"] . " </OPTION>\n";                   
    echo "</SELECT>";
    ?>
    <input type='submit' name='modif' value='modifier'></center></form>
    <br>                       
  <form action='creer.php' method='POST'>
    
      <center><input type='submit' name='fiche' value='Créer une fiche'></center></form>

            
        </section>
        
        <footer>
            
        </footer>
                
    </body>
</html>
