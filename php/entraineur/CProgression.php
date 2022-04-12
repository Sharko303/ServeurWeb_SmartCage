<?php
/**
 *  classe premetante a visualiser la progression d'un joueur.
 */
/**
 * 
 */
require_once '../config.php';
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_line.php');

class CProgression
{
    private $_joueur;
    private $_identifiant;

    function afficherListe()
        {
            $_bdd = $this->_bdd;
            $sql = "SELECT nom FROM utilisateurs WHERE type = 'joueur'";
            //$liste = $bdd->query($sql) as $bdd);
            $liste = $_bdd->query($sql);
            while ($donnees = $liste->fetch())
            {
                $nomselect = $donnees['nom'];
                echo "<OPTION VALUE=\"$nomselect\">".$nomselect.'</option>';
            } 
        }

    function afficherJoueur()
    {
            $_joueur = htmlspecialchars($_POST['nom']);
            echo $_joueur;
            $liste = new CProgression();
    }
    function afficherGraph($joueur)
    {
        
    }
}
?>
