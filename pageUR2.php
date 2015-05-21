<?php 
session_start(); 
require 'verif.php';
$id2 = $_POST['id']; 

require_once 'config.php';

    $pdo = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);

    

        $req2 = $pdo->prepare("UPDATE fiche_de_frais SET status='En_attente' WHERE idfiche = :id;");
        $req2->bindParam(':id', $id2);
        $req2->execute();
        echo "OK";
        
        header('Location: GSBIndexP.php');

?>


