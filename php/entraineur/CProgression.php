<?php
/**
 *  classe premetante a visualiser la progression d'un joueur.
 */
/**
 * 
 */
require_once '../config.php';
require_once ('../../jpgraph-4.4.0/src/jpgraph.php');
require_once ('../../jpgraph-4.4.0/src/jpgraph_line.php');
require_once ('phpChart_Lite/conf.php');
include("pChart2.1.4/class/pData.class.php");
include("pChart2.1.4/class/pDraw.class.php");
include("pChart2.1.4/class/pImage.class.php");


class CProgression
{
    public $_joueur;
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
        public function Joueur()
        {
            $_bdd = $this->_bdd;
            $_categorie = $this->_categorie;
            $sql = 'SELECT nom FROM utilisateurs WHERE categorie = "'.$_categorie.'"';
            //$liste = $bdd->query($sql) as $bdd);
            $liste = $_bdd->query($sql);
            $i = 7;
            while ($donnees = $liste->fetch())
            {
                $nomselect = $donnees['nom'];
                echo "<br><OPTION VALUE=\"$nomselect\">".$nomselect.'</option>';
                $i++;
                
            } 
        }

    function afficherJoueur()
    {
            $_joueur = htmlspecialchars($_POST['nom']);
            echo $_joueur;
            //$liste = new CProgression();
    }
    function afficherGraph($joueur)
    {
        $_bdd = $this->_bdd;
        //$_joueur = htmlspecialchars($_POST['nom']);
        $_joueur = $joueur;
        if (isset($_joueur)) 
        {
            $_joueur = $_SESSION['nom'];
        }
        echo "<img src='../../test.php?joueur=".$_joueur."' width='750' height='750'>";
    }
}
?>
