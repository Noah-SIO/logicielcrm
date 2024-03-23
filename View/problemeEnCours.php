<html>
    <form method="post">
        <label for="nombre3">Pour rechercher les problèmes à faire ou en cours</label></br>
        <input type="number" name="nombre3" id="nombre3" placeholder="entrer un chiffre"></br>
        <input type="submit" name="rechercher" id='rechercher' value='Rechercher'></br>
    </form>
</html>
<?php

if (isset($_POST['nombre3'])){
    $problemeEnCours = new ManagerAssistance();
    $problemeEnCours -> getUnsolvedIssues($_POST['nombre3']);
}

?>