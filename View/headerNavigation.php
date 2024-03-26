<!DOCTYPE html>
<html>
    <header>
        <title><?php echo $title ?></title>   
    </header>
<body>
    <h2><?php echo "Bonjour ".$_SESSION['nom']." ".$_SESSION['prenom'].","?></h2>
    <h4><?php echo "Connecté en tant que : ".$poste[$_SESSION['droit']]." | ID utilisateur : ".$_SESSION['id'].""?></h4>
    <nav>
        <ul>
            <li><a href="?action=tableauDeBord">Accueil</a></li>
            <li><a href="?action=resultatRecherche">Recherche</a></li>
            <li><a href="?action=formulaireAssistanceCo">Assistance</a></li>
            <li><?php echo"<form action=''><input type='submit' name='valider' class='button' value='Se déconnecter'/></form>";?></li>        
        </ul>
    </nav>