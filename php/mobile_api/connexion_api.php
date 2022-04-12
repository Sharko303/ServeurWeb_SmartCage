<?php
// Importing DBConfig.php file.
include '../config.php';
//On démarre une nouvelle session
class CConnexion
{
    function verif()
    {
        $json = file_get_contents('php://input');
        $obj = json_decode($json,true);

        // Populate User nom from JSON $obj array and store into $nom.
        //$nom = $obj['nom']; 
        // Populate Password from JSON $obj array and store into $password.
        //$password = hash('sha256',$obj['password']);

        $_nom = $this->_nom;
        $_password = $this->_password;
        $_bdd = $this->_bdd;

        if ($_nom!=""){
                $result = $_bdd->prepare("SELECT * FROM utilisateurs WHERE nom = ? and password = ?");
                $result->execute(array($_nom, $_password));
                $userexist = $result->rowCount();
        if ($userexist==0){
                echo json_encode('Mauvaises Informations');
            }
            else{
                $userinfo = $result->fetch();
                if($userinfo['type'] == 'entraineur'){
                    echo json_encode('entraineur');
                }
                elseif($userinfo['type'] == 'joueur'){
                    echo json_encode('joueur');
                }
            }
        }
    else{
        echo json_encode('reessayer');
        }
    }

    function deconnexion()
   {
      session_start();
      session_unset();
      session_destroy();
      exit();
   }

}
?>