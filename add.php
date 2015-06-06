<?php
session_start();

if (!isset($_SESSION['login'])) {
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
            <div id="Administration1">
                <a href="admin.php"><h2>Back</h2></a>
            </div>

            <div id="Administration1">
                <a href="logout.php"><h2>Logout</h2></a>
            </div>
            <ul>
                
                <li><a href="admin.php">GSB</a></li>
                
            </ul>
        </header>
        <section><link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
            <script src="//code.jquery.com/jquery-1.10.2.js"></script>
            <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
            <link rel="stylesheet" href="/resources/demos/style.css">
            <script>
                $(function() {
                    $("#datepicker").datepicker();
                });
            </script>
            <script>
                $(function() {
                    $("#datepicker2").datepicker();
                });
            </script>


            <center><form method="post" action="add2.php">
                    <br>
                    <center style='font-size: 30px;font-weight: bold;text-decoration: underline;'>Ajouter un employé</center>
                    <br>
                    <table>
                        <tr>   
                            <td>Nom :</td><td> <input type='text' required="required" name='nom' > </td>
                            <td>Prenom : </td><td><input type='text' required="required" name='prenom' ></td></tr>
                        <tr><td>Login : </td><td><input type='text' required="required" name='login' ></td>
                            <td>Mot de passe : </td><td><input type='password' required="required" name='mdp' ></td></tr>

                        <tr><td>Naissance :</td><td> <input type='text' required="required" name='dateN' id="datepicker" ></td>
                            <td>Date d'embauche :</td> <td><input type='text' required="required" name='dateE' id="datepicker2" ></td></tr>

                        <tr><td>Status :</td><td> <select name="status">
                                    <option value="3">Administrateur</option> 
                                    <option value="1" selected>Visiteur</option>
                                    <option value="2">Comptable</option>
                                </select></td></tr>

                        <tr><td><br><br><input type='submit' name='add' value='Ajouter Employé' ></td></tr>
                    </table>
                </form></center>


        </section>

        <footer>

        </footer>

    </body>
</html>