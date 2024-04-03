<!DOCTYPE html>
<html>
    <header>
        <title><?php echo $title ?></title>   
    </header>
<body>
    <h3>Bienvenue <?php echo $_SESSION['nom'] . ", " . $_SESSION['prenom'] . " </br>Connecté en tant que: " . $poste[$_SESSION['droit']] ?></h3>
    <nav>
        <ul>
            <li><a href="?action=tableauDeBord">Accueil</a></li>
            <li><a href="?action=resultatRecherche">Recherche</a></li>
            <li><a href="?action=formulaireAssistanceCo">Assistance</a></li>
            <li><?php echo"<form action=''><input type='submit' name='valider' class='button' value='Se déconnecter'/></form>";?></li>
            <li><?php require_once('barreDeREcherche.php')?></li>
        </ul>
    </nav>