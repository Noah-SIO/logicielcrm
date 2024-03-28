<html>
    <form method="post">
        <label for="nombre3">Pour rechercher des problèmes</label></br>
        <input type="number" name="nombre3" id="nombre3" placeholder="entrer un chiffre"> 
        <label for="filtre">trié par</label>
        <select name="filtre" id="filtre">
            <option value=1>à faire</option>
            <option value=2>en cours</option>
            <option value=3>terminé</option>
        </select>
        <input type="submit" name="rechercher" id='rechercher' value='Rechercher'></br>
    </form>
</html>
<?php

if (isset($_POST['nombre3'])){
    $problemeEnCours = new ManagerAssistance();
    $problemeEnCours -> getIssues($_POST['filtre'], $_POST['nombre3']);
}

?>