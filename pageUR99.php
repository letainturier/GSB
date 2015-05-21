<?php 
session_start(); 
require 'verif.php';


require_once 'config.php';

$id = $_SESSION['login'];

    $pdo = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);
    
    
    
     $id_visiteur = $_POST['id_visiteur'];
    $mois = $_POST['mois']; 
    $montant_total = $_POST['montant_total'];
    $date_de_modif = $_POST['date_de_modif'];
    $remboursement_total = $_POST['remboursement_total'];
    
        
        $req = $pdo->prepare('INSERT INTO fiche_de_frais(id_visiteur, mois, montant_total, date_de_modif, remboursement_total, status) VALUES(:id_visiteur, :mois, :montant_total, :date_de_modif, :remboursement_total, "En_cours")');
        $req->execute(array(
	'id_visiteur' => $id_visiteur,
	'mois' => $mois,
	'montant_total' => $montant_total,
	'date_de_modif' => $date_de_modif,
	'remboursement_total' => $remboursement_total
	));


header('Location: GSBIndexP.php');
                        

    
    
   

?>

