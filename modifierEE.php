<?php 
session_start(); 
require 'verif.php';
 

require_once 'config.php';

    $pdo = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);
    
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom']; 
    $dateN = $_POST['dateN'];
    $dateE = $_POST['dateE'];
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];
    //md5($mdp);
    $status = $_POST['status'];

        $req2 = $pdo->prepare("UPDATE employe SET nom= :nom WHERE id = :id;");
        $req2->bindParam(':id', $id);
        $req2->bindParam(':nom', $nom);
        $req2->execute();
        

$req4 = $pdo->prepare("UPDATE employe SET prenom= :prenom WHERE id = :id;");
        $req4->bindParam(':id', $id);
        $req4->bindParam(':prenom', $prenom);
        $req4->execute();
                
                
$req5 = $pdo->prepare("UPDATE employe SET date_naissance= :dateN WHERE id = :id;");
        $req5->bindParam(':id', $id);
        $req5->bindParam(':dateN', $dateN);
        $req5->execute();
        
$req6 = $pdo->prepare("UPDATE employe SET date_embauche= :dateE WHERE id = :id;");
        $req6->bindParam(':id', $id);
        $req6->bindParam(':dateE', $dateE);
        $req6->execute();
        
        
$req7 = $pdo->prepare("UPDATE employe SET login= :login WHERE id = :id;");
       $req7->bindParam(':login', $login);
       $req7->bindParam(':id', $id);
        
      $req7->execute();
        
        
        $req8 = $pdo->prepare("UPDATE employe SET mdp= :mdp WHERE login = :login;");
        $req8->bindParam(':login', $login);
        $req8->bindParam(':mdp', md5($mdp));
        $req8->execute();
        
        $req9 = $pdo->prepare("UPDATE employe SET status= :status WHERE login = :login;");
        $req9->bindParam(':login', $login);
        $req9->bindParam(':status', $status);
        $req9->execute();
        
        


header('Location: admin.php');

?>

