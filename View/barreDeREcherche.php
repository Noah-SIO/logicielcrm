
<form method="GET">
    <input type="text" name="recherche" placeholder="Recherche" required>
    <input type="submit" value="Rechercher">
</form>

<?php 

    if(isset($_GET['recherche'])){
        $recherche = $_GET['recherche'];
        echo '<a href="/?recherche=' . $recherche . 'action= rechercher'.'">Retour à la recherche</a>';
    }
    




