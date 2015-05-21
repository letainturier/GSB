<?php 
session_start(); 
require 'verif.php';

$status = $_POST['validation'];

require_once 'config.php';

    $pdo = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);
    
    $req2 = $pdo->prepare("UPDATE fiche_de_frais SET status='Valider' WHERE idfiche = :id;");
        $req2->bindParam(':id', $status);
        $req2->execute();
        echo "OK";
        
        header('Location: comptable.php');
