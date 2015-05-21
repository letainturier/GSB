


<html>
    <head>
        <title>Airplanes</title>
        <link href="css/css1.css" rel="stylesheet" type="text/css"/>
    </head>   
    <body>
        <header>    
  <ul>
    <li><a href="#1">Home</a></li>
    <li><a href="GSBIndex.php">GSB</a></li>
    <li><a href="#3">JS2 Project</a></li>
    <li><a href="#4">Labs</a></li>
    <li><a href="#5">Contact</a></li>
</ul>
        </header>
        <section>
          <?php
require 'verif.php';
    
if (empty($_POST['login']))
{
   header('Location: admin.php');  
}
else {
   $login = $_POST['login'];
}

    require_once 'config.php';


    $pdo = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);

    
    
    $req3 = $pdo->prepare("SELECT nom, prenom, login, mdp, poste, date_naissance, date_embauche, status FROM employe WHERE login = :login");

    $req3->bindParam(':login', $login);
    $req3->execute();

    $donnees3 = $req3->fetch();
    
    $nom = $donnees3['nom'];
    $prenom = $donnees3['prenom'];
    $login = $donnees3['login'];
    $mdp = $donnees3['mdp'];
    $date_naissance = $donnees3['date_naissance'];   
    $date_embauche = $donnees3['date_embauche']; 
    $status = $donnees3['status']; 
?>
            
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
 <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
  <script>
  $(function() {
    $( "#datepicker2" ).datepicker();
  });
  </script>



<form action="modifierEE.php" method="post">
<?php
 echo "<table align='center'> "
                         . "
                            <input type='hidden' value='" . $login . "' name='login'>
    <tr>                
                        <td>Nom :</td><td><input type='text' value='" . $nom . "' name='nom'></td>
                        <td>Prenom :</td><td><input type='text' value='" . $prenom . "' name='prenom'></td>
                        <td>Login :</td><td><input type='text' value='" . $login . "' name='login'></td>                     
    </tr>
    
    <tr>                <td>Mot de passe :</td><td><input type='text' value='" . $mdp . "' name='mdp'></td>
                        <td>Date de Naissance :</td><td><input type='text' value='" . $date_naissance . "' id='datepicker2' name='dateN'></td>
                        <td>Date d'embauche :</td><td><input type='text' value='" . $date_embauche . "' id='datepicker' name='dateE'></td>
                        
                        
    </tr>
    
    <tr>
    
                        <td><input type='submit' name='update' value='Update' ></td>
    </tr>
                        
                            
                         
                    </table>";
 
 ?>
</form>
            
            
            
            
            
        </section>       
            
            
            
        
        
        <footer>
            
        </footer>
                
    </body>
</html>
