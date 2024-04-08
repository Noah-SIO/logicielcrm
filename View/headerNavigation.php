<!DOCTYPE html>
<html>
    <header>
        <title><?php echo $title ?></title>   
    </header>
<body>
    <h3>Bienvenue <?php echo $_SESSION['nom'] . " " . $_SESSION['prenom'] ?>, Connecté en tant que: <?php echo $poste[$_SESSION['droit']] ?></h3>
    <form style="margin-left: auto;" action="" method="post"><input type="submit" name="valider" class="button" value="Se déconnecter"></form>
    <nav style="display: flex; justify-content: space-between; align-items: center;">
        <ul style="list-style: none; display: flex; padding: 0;">
            <li style="margin-right:5px">
                <button onclick="window.location.href='?action=tableauDeBord'">Accueil</button>
            </li>
            <li style="margin-right:5px">
                <button onclick="window.location.href='?action=formulaireAssistanceCo'">Assistance</button>
            </li>
            <li style="margin-right:5px">   
            <?php require_once('barreDeRecherche.php')?>             
            </li>
            
        </ul>
    </nav>
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