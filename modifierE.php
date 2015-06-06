


<html>
    <head>
        <title>Airplanes</title>
        <link href="css/css1.css" rel="stylesheet" type="text/css"/>
    </head>   
    <body>
        <div id="Administration1">
            <a href="admin.php"><h2>Back</h2></a>
        </div>

        <div id="Administration1">
            <a href="logout.php"><h2>Logout</h2></a>
        </div>
        <header>    
            <ul>
                
                <li><a href="admin.php">GSB</a></li>
                
            </ul>
        </header>
        <section>
            <?php
            require 'verif.php';

            if (empty($_POST['login'])) {
                header('Location: admin.php');
            } else {
                $login = $_POST['login'];
            }

            require_once 'config.php';


            $pdo = new PDO("mysql:host=" . config::SERVERNAME . ";dbname=" . config::DBNAME, config::USER, config::PASSWORD);



            $req3 = $pdo->prepare("SELECT id, nom, prenom, login, mdp, poste, date_naissance, date_embauche, status FROM employe WHERE login = :login");

            $req3->bindParam(':login', $login);
            $req3->execute();

            $donnees3 = $req3->fetch();

            $id = $donnees3['id'];
            $nom = $donnees3['nom'];
            $prenom = $donnees3['prenom'];
            $login1 = $donnees3['login'];
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
                    $("#datepicker").datepicker();
                });
            </script>
            <script>
                $(function() {
                    $("#datepicker2").datepicker();
                });
            </script>



            <form action="modifierEE.php" method="post">
                <br>
                <center style='font-size: 30px;font-weight: bold;text-decoration: underline;'>Modifier le compte d'un employer</center>

                <br>
                <?php
                echo "<table align='center'> "
                . "<input type='hidden' value='" . $id . "' name='id'>
                            
    <tr>                
                        <td>Nom :</td><td><input type='text' value='" . $nom . "' name='nom'></td>
                        <td>Prenom :</td><td><input type='text' value='" . $prenom . "' name='prenom'></td>
                        <td>Login :</td><td><input type='text' value='" . $login1 . "' name='login'></td>                     
    </tr>
    
    <tr>                <td>Mot de passe :</td><td><input type='password' value='' name='mdp'></td>
                        <td>Date de Naissance :</td><td><input type='text' value='" . $date_naissance . "' id='datepicker2' name='dateN'></td>
                        <td>Date d'embauche :</td><td><input type='text' value='" . $date_embauche . "' id='datepicker' name='dateE'></td>
                        
                        
    </tr>
    <td>Status : </td>";
                ?>

                <td>

                    <?php
                    if ($status == 1) {
                        echo 'Visiteur';
                    } elseif ($status == 2) {
                        echo 'Comptable';
                    } else {
                        echo 'Administrateur';
                    }
                    ?>

                </td>

                <?php
                $selectVis = '';
                $selectCom = '';
                $selectAdmin = '';
                if ($status == 1) {
                    $selectVis = 'selected';
                }
                if ($status == 2) {
                    $selectCom = 'selected';
                }
                if ($status == 3) {
                    $selectAdmin = 'selected';
                }

                echo"           
<td>Modifier status : </td>
  
<td><select name='status'>



          <option value='1' $selectVis>Visiteur</option>
    
          <option value='2' $selectCom>Comptable</option>
          <option value='3' $selectAdmin>Administrateur</option>       
                </select></td>
    
    <tr>
    
                        <td><br><input type='submit' name='update' value='Update' ></td>
    </tr>
                        
                            
                         
                    </table>";
                ?>
            </form>





        </section>       





        <footer>

        </footer>

    </body>
</html>
