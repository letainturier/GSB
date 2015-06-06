<div id="Administration1">
    <a href="comptable.php"><h2>Back</h2></a>
</div>

<div id="Administration1">
    <a href="logout.php"><h2>Logout</h2></a>
</div>

<?php
session_start();

if (!isset($_SESSION['login'])) {
    echo 'Vous n\'êtes pas autorisé à acceder à cette zone';
    header('Location: GSBIndex.php');
}
?> 
<?php
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

                <li><a href="#">GSB</a></li>

            </ul>
        </header>
        <section>




            <?php
            echo "<br><center><p style='font-size: 30px; font-weight: bold;'>Suivi et validation des fiches de frais</p></center>";
            $req1 = $pdo->prepare("SELECT * FROM fiche_de_frais WHERE status='En_attente'");
            $req1->execute();


            echo "<table align='center' style='border-collapse: collapse; color:white; '>";
            echo "<tr><th style='border: 1px solid black;'>ID Fiche</th>"
            . "<th style='border: 1px solid black;'>ID Visteur</th>"
            . "<th style='border: 1px solid black;'>Date Création</th>"
            . "<th style='border: 1px solid black;'>Date de modification</th>"
            . "<th style='border: 1px solid black;'>Status</th>"
            . "<th style='border: 1px solid black;'>Valider</th>"
            . "<th style='border: 1px solid black;'>Refuser</th></tr>";

            while ($donnees1 = $req1->fetch()) {
                echo "<tr><td style='border: 1px solid black;'>" . $donnees1['idfiche'] .
                "</td><td style='border: 1px solid black;'>" . $donnees1['id_visiteur'] .
                "</td><td style='border: 1px solid black;'>" . $donnees1['mois'] .
                "</td><td style='border: 1px solid black;'>" . $donnees1['date_de_modif'] .
                "</td><td style='border: 1px solid black;'>" . $donnees1['status'] .
                "</td><td style='border: 1px solid black;'><form action='valider55.php' method='post'><input type='submit' value='" . $donnees1['idfiche'] . "' name='validation'></td></form>"
                . "</td><td style='border: 1px solid black;'><form action='valider56.php' method='post'><input type='submit' value='" . $donnees1['idfiche'] . "' name='refuser'></td></form></tr> <br>";
            }
            echo "</table>";
            ?>
            <center><input type="button" value="Archiver des Fiches de Frais" onClick="javascript:document.location.href = 'archiver22.php'" /></center>
        </section>

        <footer>

        </footer>

    </body>
</html>
