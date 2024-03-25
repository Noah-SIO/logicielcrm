<form method="post" action="deleteFicheEntreprise.php">
    <input type="submit" name="supprEntreprise" value="SupprEntreprise">
</form>

<?php
//A modifier lorsque l'index seras mis en place
if (isset($_POST['supprEntreprise'])) {
    $entreprisemanager -> DeleteClientById($entrepriseID);
}

