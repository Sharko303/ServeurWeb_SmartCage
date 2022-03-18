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
        $width = 600; $height = 200;
 
        // Create a graph instance
        $graph = new Graph($width,$height);
         
        // Specify what scale we want to use,
        // int = integer scale for the X-axis
        // int = integer scale for the Y-axis   
        $graph->ygrid->Show();
         
        // Setup a title for the graph
       /* $graph->title->Set('Progression');
         
        // Setup titles and X-axis labels
        $graph->xaxis->title->Set('(year from 1701)');
         
        // Setup Y-axis title
        $graph->yaxis->title->Set('(# sunspots)');
         
        // Create the linear plot
        $lineplot=new LinePlot($ydata);
         
        // Add the plot to the graph
        $graph->Add($lineplot);
         
        // Display the graph
        $graph->Stroke(); */
    }
}
?>
