<?php
session_start();

if(!isset($_SESSION['login'])) {
  echo 'Vous n\'êtes pas autorisé à acceder à cette zone';
  include('GSBIndex.php');
  exit;
}
require_once 'config.php';

$pdo = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);
?>

<html>
    <head>
        <title>Airplanes</title>
        <link href="css/css1.css" rel="stylesheet" type="text/css"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
        <section><link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
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
            
            
            <form method="post" action="add2.php">
             <table>
                <tr>   
                <td>Nom : <input type='text' name='nom' > </td>
                <td>Prenom : <input type='text' name='prenom' ></td></tr>
                <tr><td>Login : <input type='text' name='login' ></td>
                <td>Mot de passe : <input type='text' name='mdp' ></td></tr>
                
                <tr><td>Naissance : <input type='text' name='dateN' id="datepicker" ></td>
                    <td>Date d'embauche : <input type='text' name='dateE' id="datepicker2" ></td></tr>
                
                <tr><td>Status : <select name="status">
                    <option value="3">Administrateur</option> 
                    <option value="1" selected>Visiteur</option>
                    <option value="2">Comptable</option>
                </select></td></tr> </table>
                
                <input type='submit' name='add' value='Ajouter Employé' >
                
            </form>
            
            
        </section>
        
        <footer>
            
        </footer>
                
    </body>
</html>