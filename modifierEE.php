<?php 
session_start(); 
require 'verif.php';
 

require_once 'config.php';

    $pdo = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);
    
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom']; 
    $dateN = $_POST['dateN'];
    $dateE = $_POST['dateE'];
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];

        $req2 = $pdo->prepare("UPDATE employe SET nom= :nom WHERE login = :login;");
        $req2->bindParam(':login', $login);
        $req2->bindParam(':nom', $nom);
        $req2->execute();
        echo "OK";

$req4 = $pdo->prepare("UPDATE employe SET prenom= :prenom WHERE login = :login;");
        $req4->bindParam(':login', $login);
        $req4->bindParam(':prenom', $prenom);
        $req4->execute();
                
                
$req5 = $pdo->prepare("UPDATE employe SET date_naissance= :dateN WHERE login = :login;");
        $req5->bindParam(':login', $login);
        $req5->bindParam(':dateN', $dateN);
        $req5->execute();
        
$req6 = $pdo->prepare("UPDATE employe SET date_embauche= :dateE WHERE login = :login;");
        $req6->bindParam(':login', $login);
        $req6->bindParam(':dateE', $dateE);
        $req6->execute();
        
        
$req7 = $pdo->prepare("UPDATE employe SET login= :login WHERE login = :login;");
        $req7->bindParam(':login', $login);
        
        $req7->execute();
        
        
        $req8 = $pdo->prepare("UPDATE employe SET mdp= :mdp WHERE login = :login;");
        $req8->bindParam(':login', $login);
        $req8->bindParam(':mdp', $mdp);
        $req8->execute();
        
        


header('Location: admin.php');

?>

