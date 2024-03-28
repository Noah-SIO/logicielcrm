<form method="GET" action="resultatDeRecherche.php">
    <input type="text" name="recherche" placeholder="Recherche" required>
    <button type="submit">ok</button>
</form>
<?php
if(isset($_GET['submit'])){
    header('Location:resultatDeRecherche.php?recherche='.$_GET['q']);
}
?>
