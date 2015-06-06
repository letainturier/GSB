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

if (empty($_POST['id'])) {
    header('Location: GSBIndex.php');
} else {

    $idvisiteur = $_POST['id'];
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
            $id = $_POST['id'];
           
            $req2 = $pdo->prepare("SELECT * FROM employe WHERE id= :id");
            $req2->bindParam(':id', $id);
            $req2->execute();
            while ($donnees2 = $req2->fetch()) {

                $nom = $donnees2['nom'];
                $prenom = $donnees2['prenom'];
            }
            ?>
            <br><h1><center>Vous êtes sur la/les fiche(s) crée(s) par <?php echo $nom; ?> <?php echo $prenom; ?></center></h1>





            <div id="table">  <?php
                $req1 = $pdo->prepare("SELECT * FROM fiche_de_frais WHERE id_visiteur= :id and status != 'En_cours'");
                $req1->bindParam(':id', $idvisiteur);
                $req1->execute();
                echo "<table align='left' style='border-collapse: collapse; color:white; margin-left: 130px;'>";
                echo "<tr><th style='border: 1px solid black;'>ID Visiteur</th>"
                . "<th style='border: 1px solid black;'>Mois</th>"
                . "<th style='border: 1px solid black;'>Montant Total</th>"
                . "<th style='border: 1px solid black;'>Date de modification</th>"
                . "<th style='border: 1px solid black;'>Remboursement total</th>"
                . "<th style='border: 1px solid black;'>status</th></tr>";

                while ($donnees1 = $req1->fetch()) {
                    echo "<tr><td style='border: 1px solid black;'>" . $donnees1['id_visiteur'] .
                    "</td><td style='border: 1px solid black;'>" . $donnees1['mois'] .
                    "</td><td style='border: 1px solid black;'>" . $donnees1['montant_total'] .
                    "</td><td style='border: 1px solid black;'>" . $donnees1['date_de_modif'] .
                    "</td><td style='border: 1px solid black;'>" . $donnees1['remboursement_total'] .
                    "</td><td style='border: 1px solid black;'>" . $donnees1['status'] .
                    "</td></tr> <br>";
                }
                echo "</table>";
                ?></div>



        </section>

        <footer>

        </footer>

    </body>
</html>

