<!DOCTYPE html>
<html>
    <header>
        <title><?php echo $title ?></title>   
    </header>
<body>
    <?php echo "<h3>Bonjour " . $_SESSION['nom'] . " " . $_SESSION['prenom'] . ", nous sommes le " . date("Y-m-d") . " | " . $poste[$_SESSION['droit']] . "</h3><br/>"; ?>
    <nav style="display: flex; align-items: center;">
        <ul style="list-style: none; display: flex; padding: 0;">
            <li style="margin-right:5px">
            <form style="margin-left: auto;" action="" method="post"><input type="submit" name="deconnexion" class="buttonNAV" value="Se déconnecter" class="button"></form>
</li>
            <li style="margin-right:5px">
                <button onclick="window.location.href='?action=tableauDeBord'" class="buttonNAV">Accueil</button>
            </li>
            <li style="margin-right:5px">
                <button onclick="window.location.href='?action=formulaireAssistanceCo'" class="buttonNAV">Assistance</button>
            </li>
            <li style="margin-right:5px">   
            <?php require_once('barreDeRecherche.php')?>             
            </li>
            
        </ul>
    </nav>
            <?php
                if(isset($_POST['deconnexion'])){
                    session_destroy();
                    $_SESSION = array();
                    $_SESSION['id'] = null;
                    $_GET['action'] = '.';
                    header('Location:index.php');
                    exit();
                }
            ?>
    </nav>