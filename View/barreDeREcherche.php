
<form action="?action=tableauDeBord" method="POST">
    <input type="text" name="recherche" placeholder="Recherche" required>
    <input type="submit" value="Rechercher">
</form>

<?php 

    if(isset($_POST['recherche'])){
        $_SESSION['recherche'] = $_POST['recherche'];
        header("Location: ?action=resultatDeRecherche");
        // echo "<a href='?action=tableauDeBord&recherche=" . $recherche . "'>Retour à la recherche</a></br>";
    }
    




