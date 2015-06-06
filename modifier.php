
<div id="Administration1">
    <a href="GSBIndexP.php"><h2>Back</h2></a>
</div>

<div id="Administration1">
    <a href="logout.php"><h2>Logout</h2></a>
</div>


<?php
session_start();



if (!isset($_SESSION['login'])) {
    echo 'Vous n\'êtes pas autorisé à acceder à cette zone';
    include('GSBIndex.php');
    exit;
}

require_once 'config.php';

$pdo = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);

if (!empty($_POST['idfiche'])) {

    $idSupp = $_POST['idfiche'];
    ?> 

    <html>
        <head>
            <title>Airplanes</title>
            <link href="css/css1.css" rel="stylesheet" type="text/css"/>
            <meta charset="utf-8">

            <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
            <script src="//code.jquery.com/jquery-1.10.2.js"></script>
            <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
            <link rel="stylesheet" href="/resources/demos/style.css">
            <script>
                $(function() {
                    $("#datepicker").datepicker();
                });
            </script>
            <script>
                $(function() {
                    $("#datepicker2").datepicker();
                });
            </script>
        </head>   
        <body>
            <header>    
                <ul>
                    
                    <li><a href="#">GSB</a></li>
                    
                </ul>
            </header>
            <section>

                <br> <h1><center>Page de modification et de validation des fiches de frais</center></h1>

    <?php
    $req3 = $pdo->prepare("SELECT idfiche, id_visiteur, mois, montant_total, date_de_modif, remboursement_total FROM fiche_de_frais WHERE idfiche = :idSupp");

    $req3->bindParam(':idSupp', $idSupp);
    $req3->execute();

    $donnees3 = $req3->fetch();

    $id_visiteur = $donnees3['id_visiteur'];
    $mois = $donnees3['mois'];
    $montant_total = $donnees3['montant_total'];
    $date_de_modif = $donnees3['date_de_modif'];
    $remboursement_total = $donnees3['remboursement_total'];
    ?>



               

                    <form action="pageUR.php" method="post">
    <?php
    echo "<table align='center'> "
    . "<input type='hidden' value='" . $id_visiteur . "' name='id_visiteur'>
                            <input type='hidden' value='" . $idSupp . "' name='id'>
    <tr>                
                        <td>Mois :</td><td><input type='text' value='" . $mois . "'  id='datepicker' name='mois'></td>
                        <td>Type :</td><td><input type='text' value='" . $remboursement_total . "' name='remboursement_total'></td>                     
    </tr>
    
    <tr>                <td>Montant Total :</td><td><input type='text' value='" . $montant_total . "' name='montant_total'></td>
                        <td>Date de Modif :</td><td><input type='text' value='" . $date_de_modif . "' id='datepicker2' name='date_de_modif'></td>
                        
                        
                        
    </tr>
    
    <tr>
    
                        <td><input type='submit' name='update' value='Update' ></td>
    </tr>
                        
                            
                         
                    </table>";
    ?>
               
                
                    </form>
                   
                    <form action="pageUR2.php" method="post">       
                        <?php
                        $req55 = $pdo->prepare("SELECT idfiche, id_visiteur, mois, montant_total, date_de_modif, remboursement_total FROM fiche_de_frais WHERE idfiche = :idSupp");
                        $req55->bindParam(':idSupp', $idSupp);
                        $req55->execute();
                        echo "<table align='left' style='border-collapse: collapse; color:white; margin-left: 130px;'>";
                        echo "<tr><th style='border: 1px solid black;'>ID Visiteur</th>"
                        . "<th style='border: 1px solid black;'>Mois</th>"
                        . "<th style='border: 1px solid black;'>Montant Total</th>"
                        . "<th style='border: 1px solid black;'>Date de modification</th>"
                        . "<th style='border: 1px solid black;'>Type</th>"
                        . "<th style='border: 1px solid black;'>status</th></tr>";

                        while ($donnees1 = $req55->fetch()) {
                            echo "<input type='hidden' value='" . $idSupp . "' name='id'><tr><td style='border: 1px solid black;'>" . $donnees1['id_visiteur'] .
                            "</td><td style='border: 1px solid black;'>" . $donnees1['mois'] .
                            "</td><td style='border: 1px solid black;'>" . $donnees1['montant_total'] .
                            "</td><td style='border: 1px solid black;'>" . $donnees1['date_de_modif'] .
                            "</td><td style='border: 1px solid black;'>" . $donnees1['remboursement_total'] .
                            "</td><td style='border: 1px solid black;'><input type='submit' name='envoyer' value='Envoyer pour validation' >
                </td></tr> <br>";
                        }
                        echo "</table>";
                        ?>
   
                    </form>         

                  





    <?php
}  else {
    header('Location: GSBIndexP.php');
}
?> 





        </section>

        <footer>

        </footer>

    </body>
</html>





