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
            <li><a href="?action=formulaireAssistanceCo">Assistance</a></li>
            <li><form action="" method="post"><input type="submit" name="valider" class="button" value="Se déconnecter"></form></li>
            <li><?php require_once('barreDeRecherche.php')?></li>
        </ul>
            <?php
                if(isset($_POST['valider'])){
                    session_destroy();
                    $_SESSION = array();
                    $_SESSION['id'] = null;
                    $_GET['action'] = '.';
                    header('Location:index.php');
                    exit();
                }
            ?>
    </nav>