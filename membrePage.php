<link href="css/css1.css" rel="stylesheet" type="text/css"/>
<?php

require_once 'config.php';



$pdo = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);


if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['pass'])) {
  extract($_POST);
  
   
    $req3 = $pdo->prepare("select mdp, status, poste from employe where login=:login1");

    $req3->bindParam(':login1', $login);
    $req3->execute();
  
 
    
     $data = $req3->fetch();
     
     $mdp = $data['mdp'];
     $poste = $data['poste'];
     
     //echo "$mdp <br>";
     
     
  if($mdp != md5($pass) or $poste != 'Actif') {
    echo '<p>Mauvais login / password ou compte désactivé.</p>';
    include('GSBIndex.php'); 
    exit;
  }
  elseif($mdp == md5($pass) and $data['status'] == 1 ) {
    session_start();
    $_SESSION['login'] = $login;
    
    header('Location: GSBIndexP.php');  
  } 
  
  elseif($mdp == md5($pass) and $data['status'] == 2 ) {
    session_start();
    $_SESSION['login'] = $login;
    
    header('Location: comptable.php');
    
    
  } 
  
  elseif($mdp == md5($pass) and $data['status'] == 3 ) {
    session_start();
    $_SESSION['login'] = $login;
    header('Location: admin.php');

  }
}  


else {
  
   include('GSBIndex.php'); 
   exit; 
}



?>


