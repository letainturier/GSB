<?php 
session_start(); 
require 'verif.php';
$id2 = $_POST['id']; 

require_once 'config.php';

    $pdo = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);
    
    $id_visiteur = $_POST['id_visiteur'];
    $mois = $_POST['mois']; 
    $montant_total = $_POST['montant_total'];
    $date_de_modif = $_POST['date_de_modif'];
    $remboursement_total = $_POST['remboursement_total'];
    

        $req2 = $pdo->prepare("UPDATE fiche_de_frais SET id_visiteur= :id_visiteur2 WHERE idfiche = :id;");
        $req2->bindParam(':id', $id2);
        $req2->bindParam(':id_visiteur2', $id_visiteur);
        $req2->execute();
        echo "OK";

$req4 = $pdo->prepare("UPDATE fiche_de_frais SET montant_total= :montant_total2 WHERE idfiche = :id;");
        $req4->bindParam(':id', $id2);
        $req4->bindParam(':montant_total2', $montant_total);
        $req4->execute();
                
                
$req5 = $pdo->prepare("UPDATE fiche_de_frais SET date_de_modif= :date_de_modif2 WHERE idfiche = :id;");
        $req5->bindParam(':id', $id2);
        $req5->bindParam(':date_de_modif2', $date_de_modif);
        $req5->execute();
        
$req6 = $pdo->prepare("UPDATE fiche_de_frais SET mois= :mois2 WHERE idfiche = :id;");
        $req6->bindParam(':id', $id2);
        $req6->bindParam(':mois2', $mois);
        $req6->execute();
        
        
$req7 = $pdo->prepare("UPDATE fiche_de_frais SET remboursement_total= :remboursement_total2 WHERE idfiche = :id;");
        $req7->bindParam(':id', $id2);
        $req7->bindParam(':remboursement_total2', $remboursement_total);
        $req7->execute();
        


header('Location: GSBIndexP.php');

?>



