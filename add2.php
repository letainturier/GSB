<?php 
session_start(); 
require 'verif.php';


require_once 'config.php';

$id = $_SESSION['login'];

    $pdo = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);
    
    
    
     $nom = $_POST['nom'];
    $prenom = $_POST['prenom']; 
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];
    echo md5($mdp);
    $dateN = $_POST['dateN'];
    $dateE = $_POST['dateE'];
    $status = $_POST['status'];
    
    
        
        
        $req = $pdo->prepare('INSERT INTO `employe`(`id_adresse`, `nom`, `prenom`, `login`, `mdp`, `poste`, `date_naissance`, `date_embauche`, `puissance_vehicule`, `status`) VALUES(4, :nom, :prenom, :login, :mdp, "Actif", :dateN, :dateE, 0, :status)');
        $req->execute(array(
	//'id_adresse' => $id_visiteur,
	'nom' => $nom,
	'prenom' => $prenom,
	'login' => $login,
        'mdp' => md5($mdp),
        'dateN' => $dateN,
	'dateE' => $dateE,
        'status' => $status
	));


header('Location: admin.php');
