<?php

$rappel = new ManagerRappelAlerte();//même chose
$donneestableau = $rappel->getAlerteRappel($_SESSION['id']);
    echo "<h2>Vos Rappels et Alertes</h2></br>";
    if($donneestableau != NULL){
    for ($i = 0; $i < count($donneestableau); $i++) {
        $_GET['idAlerte'] = $donneestableau[$i]->getId();

        echo "<ul>";
        echo "<li> <b>Statut :</b> ".$alerte[$donneestableau[$i]->getStatut()]. "";
        if ($donneestableau[$i]->getStatut() == 1){
            $_GET['statutAlerte'] = $donneestableau[$i]->getStatut();
            echo " <a href='?action=modifierAlerteRappel&idAlerte=".$_GET['idAlerte']."&statutAlerte=".$_GET['statutAlerte']."''><button>Terminer</button></a>";
        }
        echo "</li> <li> <b>Début :</b> ".$donneestableau[$i]->getDateDebut(). " </li>";
        echo "<li> <b>Fin :</b> ".$donneestableau[$i]->getDateFin()."</li>";
        echo "<li> <b>Sujet :</b> ".$donneestableau[$i]->getSujet()."</li>";
        echo "<li> <b>Contenu :</b> ".$donneestableau[$i]->getContenu();
        echo "</li>
            </ul> </br>";
        }
    }
?>