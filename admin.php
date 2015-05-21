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
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
            
            
            <form method="post" action="add.php">
                
                <input type='submit' name='add' value='Ajouter Employé' >
                
            </form>
            
            <form method="post" action="modifierE.php">
                
                <?php                                                     
                $req = $pdo->prepare("SELECT id, login, nom, prenom FROM employe");
                $req->execute();
                echo "<SELECT NAME='login' onChange='FocusObjet()' style='width:150px;'>";
                while ($donnees = $req->fetch())
                echo "<OPTION VALUE='" . $donnees["login"] . "'>" . $donnees['nom'] ." | ". $donnees['prenom'] . "</OPTION>\n";                   
                echo "</SELECT>";
                ?>
                
                <input type='submit' name='mod' value='Modifier Employé' >
                
            </form>
            
            
        </section>
        
        <footer>
            
        </footer>
                
    </body>
</html>

