<?php 
session_start(); 
require 'verif.php';

$status = $_POST['refuser'];


require_once 'config.php';

    $pdo = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);

    $req2 = $pdo->prepare("UPDATE fiche_de_frais SET status='Refuser' WHERE idfiche = :id;");
        $req2->bindParam(':id', $status);
        $req2->execute();
  
       header('Location: comptable.php');