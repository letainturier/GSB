<?php

session_start(); 
require 'verif.php';
 

require_once 'config.php';

    $pdo = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);
    
    
    $login = $_POST['login'];
    

        $req2 = $pdo->prepare("UPDATE employe SET poste='NonActif' WHERE login = :login;");
        $req2->bindParam(':login', $login);
        $req2->execute();
        
        header('Location: admin.php');

?>