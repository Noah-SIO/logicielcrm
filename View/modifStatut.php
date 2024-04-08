<?php
if(isset($_GET['id'])&&isset($_GET['statut'])){
$assistanceStatut = new ManagerAssistance();
$assistanceStatut -> getIssueSelected($_GET['id'], $_GET['statut']);
$issueSelected = $assistanceStatut -> getIssueSelected($_GET['id'], $_GET['statut']);
echo "<li>date : ".$issueSelected['date']." | statut : ".$statut[$issueSelected['statut']]." | sujet : ".$issueSelected['sujet']." | contenu : ".$issueSelected['contenu']."";
}
?>
<html>
    <form method="post">
        <select name="statut" id="statut">
            <option value="">- Choix du statut -</option>
            <option value=1>A faire</option>
            <option value=2>En cours</option>
            <option value=3>Terminé</option>
        </select>
        <input type="submit" name="Modifier" id='Modifier' value='Modifier'></br>
    </form>
</html>
<?php    

if (isset($_POST['statut'])){
    $assistanceStatut -> updateStatut($_SESSION['idProbleme'], $_POST['statut']);
    if ($assistanceStatut -> updateStatut($_SESSION['idProbleme'], $_POST['statut']) ==  true){
        echo "</br>-- Statut changé --";
        echo " <a href='?action=tableauDeBord><button>Retour tableau de bord</button></a>";
    }
}

?>