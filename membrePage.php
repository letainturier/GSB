<link href="css/css1.css" rel="stylesheet" type="text/css"/>
<?php


$db = mysql_connect('localhost', 'root', ''); 


mysql_select_db('gsb',$db);

if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['pass'])) {
  extract($_POST);
  
  $sql = "select mdp, status from employe where login='".$login."'";
  $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

  $data = mysql_fetch_assoc($req);

  if($data['mdp'] != $pass) {
    echo '<p>Mauvais login / password. Merci de recommencer</p>';
    include('GSBIndex.php'); 
    exit;
  }
  elseif($data['mdp'] == $pass and $data['status'] == 1 ) {
    session_start();
    $_SESSION['login'] = $login;
    
    header('Location: GSBIndexP.php');
    
    
  } 
  
  elseif($data['mdp'] == $pass and $data['status'] == 2 ) {
    session_start();
    $_SESSION['login'] = $login;
    
    header('Location: comptable.php');
    
    
  } 
  
  elseif($data['mdp'] == $pass and $data['status'] == 3 ) {
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


