<?php
session_start();

if (!isset($_SESSION['login'])) {
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
            <div id="Administration1">
                <a href="logout.php"><h2>Logout</h2></a>
            </div>
            <ul>

                <li><a href="#">GSB</a></li>

            </ul>
        </header>
        <section>
            <center style='color: white; font-weight: bold;text-decoration: underline;'>Vous êtes sur le pannel d'administration</center>
            <br>
            <center>Ajouter un employé à partir du bouton suivant : </center>
            <br>
            <center><form method="post" action="add.php">

                    <input type='submit' name='add' value='Ajouter Employé' >

                </form></center>
            <br>
            <center>Modifier un employé à partir du bouton suivant : </center>
            <br>
            <center><form method="post" action="modifierE.php">

                    <?php
                    $req = $pdo->prepare("SELECT id, login, nom, prenom FROM employe Where poste = 'Actif'");
                    $req->execute();
                    echo "<SELECT NAME='login' onChange='FocusObjet()' style='width:150px;'>";
                    while ($donnees = $req->fetch())
                        echo "<OPTION VALUE='" . $donnees["login"] . "'>" . $donnees['nom'] . " | " . $donnees['prenom'] . "</OPTION>\n";
                    echo "</SELECT>";
                    ?>

                    <input type='submit' name='mod' value='Modifier Employé' >

                </form></center>


            <br>
            <center>Supprimer un employé à partir du bouton suivant : </center>
            <br>
            <center><form method="post" action="supprimer.php">

                    <?php
                    $req = $pdo->prepare("SELECT id, login, nom, prenom FROM employe Where poste = 'Actif'");
                    $req->execute();
                    echo "<SELECT NAME='login' onChange='FocusObjet()' style='width:150px;'>";
                    while ($donnees = $req->fetch())
                        echo "<OPTION VALUE='" . $donnees["login"] . "'>" . $donnees['nom'] . " | " . $donnees['prenom'] . "</OPTION>\n";
                    echo "</SELECT>";
                    ?>

                    <input type='submit' name='mod' value='Supprimer Employé' >

                </form></center>


        </section>

        <footer>

        </footer>

    </body>
</html>

