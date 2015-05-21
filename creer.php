
<div id="Administration1">
    <a href="GSBIndexP.php"><h2>Back</h2></a>
        </div>

<div id="Administration1">
    <a href="logout.php"><h2>Logout</h2></a>
        </div>



<?php
session_start();

if(!isset($_SESSION['login'])) {
  echo 'Vous n\'êtes pas autorisé à acceder à cette zone';
  include('GSBIndex.php');
  exit;
}

$id = $_SESSION['login'];


require_once 'config.php';

    $pdo = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);
    
?>

<html>
    <head>
        <title>Airplanes</title>
        <link href="css/css1.css" rel="stylesheet" type="text/css"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
            




<form action="pageUR99.php" method="post">
<?php
    $req1 = $pdo->prepare("SELECT id FROM employe WHERE login='$id'");
    $req1->execute();
    
    
    
                            
    
   
                        

    while ($donnees1 = $req1->fetch()) {
    
 echo "<table align='center'>  <input type='hidden' value='". $donnees1['id'] ."' name='id_visiteur'> 
                            <input type='hidden' name='id'>
    <tr>                
                        <td>Date :</td><td><input type='text'  id='datepicker' name='mois'></td>
                        <td>Remboursement Total :</td><td><input type='text' name='remboursement_total'></td>                     
    </tr>
    
    <tr>                <td>Montant Total :</td><td><input type='text' name='montant_total'></td>
                        <td>Date de Modif :</td><td><input type='text' id='datepicker2' name='date_de_modif'></td>
                        
                        
                        
    </tr>
    
    <tr>
    
                        <td><input type='submit' name='creer' value='Créer' ></td>
    </tr>
                        
                            
                         
    </table>"; }
 
 ?>
</form>
            
            

            
        </section>
        
        <footer>
            
        </footer>
                
    </body>
</html>


