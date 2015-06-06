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

require_once 'config.php';

$pdo = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);

if (empty($_POST['mois'])) {
    header('Location: comptable.php');
} else {
    $mois = $_POST['mois'];
}
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
$req22 = $pdo->prepare("SELECT * FROM fiche_de_frais WHERE mois= :moisT");
$req22->bindParam(':moisT', $mois);
$req22->execute();

while ($donnees22 = $req22->fetch()) {

    $idfiche = $donnees22['idfiche'];
}

$date = $_POST['mois'];

$req23 = $pdo->prepare("SELECT * FROM fiche_de_frais INNER JOIN employe ON fiche_de_frais.id_visiteur = employe.id WHERE mois= :moisT");
$req23->bindParam(':moisT', $mois);
$req23->execute();
while ($donnees23 = $req23->fetch()) {

    $nom = $donnees23['nom'];
    $prenom = $donnees23['prenom'];
}
?>
            <br><h1><center>Vous êtes sur la fiche n°<?php echo $idfiche; ?>, crée par <?php echo $nom; ?> <?php echo $prenom; ?> le <?php echo $date; ?> </center></h1>


            <div id="table">  <?php
            $req1 = $pdo->prepare("SELECT * FROM fiche_de_frais WHERE mois= :moisT");
            $req1->bindParam(':moisT', $mois);
            $req1->execute();
            echo "<table align='left' style='border-collapse: collapse; color:white; margin-left: 130px;'>";
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
                $idfiche = $donnees1['idfiche'];
            }
            echo "</table>";
            ?></div>
        </section>

        <footer>

        </footer>

    </body>
</html>

