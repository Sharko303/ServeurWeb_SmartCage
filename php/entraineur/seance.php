<?php
require_once 'CSeance.php';
session_start();
if(!isset($_SESSION["nom"])) // je vérifie si l'utilisateur a
{
    header("Location: /ServeurWeb_SmartCage/connexion.php");
    exit(); 
  }
if ($_SESSION["type"] == 'joueur')
{
    header("Location: /ServeurWeb_SmartCage/php/interdit.php");
}
?>
<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <title>Inscription</title>
        </head>
        <body>
        <div class="login-form">
            <?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div class="alert">
                                <strong>Succès</strong> inscription réussie !
                            </div>
                        <?php
                        break;

                        case 'password':
                        ?>
                            <div class="alert">
                                <strong>Erreur</strong> mot de passe différent
                            </div>
                        <?php
                        break;

                        case 'pseudo_length':
                        ?>
                            <div class="alert">
                                <strong>Erreur</strong> pseudo trop long
                            </div>
                        <?php 
                        case 'already':
                        ?>
                            <div class="alert">
                                <strong>Erreur</strong> compte deja existant
                            </div>
                        <?php 

                    }
                }
                ?>
            <script>
                    function setColor(e) 
                    {
                       var target = e.target,
                           status = e.target.classList.contains('active');

                       e.target.classList.add(status ? 'inactive' : 'active');
                       e.target.classList.remove(status ? 'active' : 'inactive');

                    }
                    function afficherU15(etat)
                    {
                        document.getElementById("grande").style.visibility=etat;
                        document.getElementById("moyenne").style.visibility='hidden';
                        document.getElementById("petite").style.visibility='hidden';
                    }
                    function afficherU13(etat)
                    {
                        document.getElementById("grande").style.visibility='hidden';
                        document.getElementById("moyenne").style.visibility=etat;
                        document.getElementById("petite").style.visibility='hidden';
                    }

                    function afficherU7(etat)
                    {
                        document.getElementById("grande").style.visibility=hidden;
                        document.getElementById("moyenne").style.visibility=hidden;
                        document.getElementById("petite").style.visibility=etat;
                    }
            </script>
            <div id="container">
            <form action="creer_seance.php" method="post">
                <h1>Nouvelle seance</h1>
                    <b>Nom de l'entraineur :</b>
                <select name="nom" required>
                <option value="">Choisir
<?php
        $liste = new CSeance();
        $liste->_bdd = $bdd;
        $liste->afficherListe();
?>
    

                </select>    <br>

                <label><b>Categorie :</b></label>       
                    <input type="radio" name="categorie" value="U7" onclick="afficherU7('visible');">U6/U7
                    <input type="radio" name="categorie" value="U9"onclick="afficherU13('visible');">U8/U9
                    <input type="radio" name="categorie" value="U13"onclick="afficherU13('visible');">U10-U13
                    <input type="radio" name="categorie" value="U15+" onclick="afficherU15('visible');">U15+
                    </select> <br>
                    <b>Zone de tir :</b>
                    <div id="grande" style=" visibility:hidden">Grande Cage :
                        <br>
                <input type="button" id="button" class="inactive" name="btn1" value = "1" style= "color:white; padding-right: 20px; " onclick="setColor(event)";/>
                <input type="button" class="inactive" id="button" value = "2" style= "color:white; padding-right: 20px; " onclick="setColor(event)";/>
                <input type="button" class="inactive" id="button" value = "3" style= "color:white; padding-right: 20px; " onclick="setColor(event)";/>
                
                <br>
                <input type="button" class="inactive" id="button" value = "4" style= "color:white; padding-right: 20px; " onclick="setColor(event)";/>
                <input type="button" class="inactive" id="button" value = "5" style= "color:white; padding-right: 20px; " onclick="setColor(event)";/>
                <input type="button" class="inactive" id="button" value = "6" style= "color:white; padding-right: 20px; " onclick="setColor(event)";/>
                <br>    
                <input type="button" class="inactive" id="button" value = "7" style= "color:white; padding-right: 20px; " onclick="setColor(event)";/>
                <input type="button" class="inactive" id="button" value = "8" style= "color:white; padding-right: 20px; " onclick="setColor(event)";/>
                <input type="button" class="inactive" id="button" value = "9" style= "color:white; padding-right: 20px; " onclick="setColor(event)";/>
                </div>
                
                <div id="moyenne" style=" visibility:hidden">Moyenne  Cage :
                    <br>
                <input type="button" id="button" class="inactive" name="btn1" value = "1" style= "color:white; padding-right: 20px; " onclick="setColor(event)";/>
                <input type="button" class="inactive" id="button" value = "2" style= "color:white; padding-right: 20px; " onclick="setColor(event)";/>
                
                <br>
                <input type="button" class="inactive" id="button" value = "4" style= "color:white; padding-right: 20px; " onclick="setColor(event)";/>
                <input type="button" class="inactive" id="button" value = "5" style= "color:white; padding-right: 20px; " onclick="setColor(event)";/>
                </div>


                <div id="petite" style=" visibility:hidden">Petite Cage :
                    <br>
                <input type="button" class="inactive" id="button" value = "4" style= "color:white; padding-right: 20px; " onclick="setColor(event)";/>
                <input type="button" class="inactive" id="button" value = "2" style= "color:white; padding-right: 20px; " onclick="setColor(event)";/>
                
                </div>

                <input type="submit" id='submit' value='CREER' name="submit">
                    <a class="inscr" href="connexion.php">Ancienne</a>
            </form>
        
        
        <style>
        body
            {
                background-color: grey;
            }
        #container
            {
                width:400px;
                margin:0 auto;
                margin-top:5%;
            }
            /* Bordered form */
            form 
            {
                width:100%;
                padding: 30px;
                border: 1px solid #f1f1f1;
                background: #fff;
                box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
            }
            #container h1
            {
                width: 100%;
                text-align: center;
                margin: 0 auto;
                padding-bottom: 10px;
            }

            /* Full-width pour les inputs */
            input[type=text], input[type=password] 
            {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }

            /* style pour tous les buttons */
            input[type=submit] {
                background-color: black;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 100%;
            }
            input[type=submit]:hover {
                background-color: white;
                color: black;
                border: 1px solid black;
            }
            .alert
            {
                background-color: red;
                width:360px;
                margin:0 auto;
                margin-top:0%;
                /*style*/
                color: white;
                padding: 14px 20px;
                border: 10px;
                cursor: pointer;
            }
            .inscr
            {
                color:  black;
                margin-left:42%;
            }
            .categorie
            {
                text-align: center;
                width: 20%;
                margin-left: 20px;
                margin-bottom: 10px;
            }
            .active 
            {
                
                background-color: #7FFF00; 
            }

            .inactive 
            {

                background-color: #FF0000;
            }
        </style>
        </body>
</html>
