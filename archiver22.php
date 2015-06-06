


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
            <div id="Administration1">
                <a href="comptable.php"><h2>Back</h2></a>
            </div>

            <div id="Administration1">
                <a href="logout.php"><h2>Logout</h2></a>
            </div>
            <ul>

                <li><a href="#">GSB</a></li>

            </ul>
        </header>
        <section>
            <?php
            echo "<br><center><p style='font-size: 30px; font-weight: bold;'>Archiver des fiches de frais</p></center>";


            $req2 = $pdo->prepare("SELECT * FROM fiche_de_frais WHERE status='Valider'");
            $req2->execute();


            echo "<table align='center' style='border-collapse: collapse; color:white; '>";
            echo "<tr><th style='border: 1px solid black;'>ID Fiche</th>"
            . "<th style='border: 1px solid black;'>ID Visteur</th>"
            . "<th style='border: 1px solid black;'>Date Création</th>"
            . "<th style='border: 1px solid black;'>Date de modification</th>"
            . "<th style='border: 1px solid black;'>Status</th>"
            . "<th style='border: 1px solid black;'>Archiver</th></tr>";

            while ($donnees2 = $req2->fetch()) {
                echo "<tr><td style='border: 1px solid black;'>" . $donnees2['idfiche'] .
                "</td><td style='border: 1px solid black;'>" . $donnees2['id_visiteur'] .
                "</td><td style='border: 1px solid black;'>" . $donnees2['mois'] .
                "</td><td style='border: 1px solid black;'>" . $donnees2['date_de_modif'] .
                "</td><td style='border: 1px solid black;'>" . $donnees2['status'] .
                "</td><td style='border: 1px solid black;'><form action='archiver23.php' method='post'><input type='submit' value='" . $donnees2['idfiche'] . "' name='archiver'></td></form>
                </tr> <br>";
            }
            echo "</table>";
            ?>

        </section>

        <footer>

        </footer>

    </body>
</html>

