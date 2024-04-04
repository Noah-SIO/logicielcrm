<?php
//A modifier lorsque l'index seras mis en place
if (isset($_POST['supprEntreprise'])) {
    $entreprisemanager -> DeleteClientById($entrepriseID);
    echo '<h3>Confirmer la suppression</h3>';
    echo "<script>setTimeout(function(){location.reload(); },3000);</script>";
}
?>
<form method="post" action="deleteFicheEntreprise.php">
    <input type="submit" name="supprEntreprise" value="SupprEntreprise">
</form>



