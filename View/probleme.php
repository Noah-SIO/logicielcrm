<html>
    <form method="post">
        <label for="nombre3">Pour rechercher des problèmes :</label></br>
        <!-- <input type="number" name="nombre3" id="nombre3" placeholder="entrer un chiffre">  -->
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

if (isset($_POST['filtre'])){
    $problemeEnCours = new ManagerAssistance();
    $probleme = $problemeEnCours -> getIssues($_POST['filtre'], 10);
    if ($_POST['filtre'] ==  3){
        for ($i = 0; $i < count($probleme); $i++) {
            echo "<ul>";
            echo "<li>date : ".$probleme[$i]['date']." | statut : ".$statut[$probleme[$i]['statut']]." | sujet : ".$probleme[$i]['sujet']." | contenu : ".$probleme[$i]['contenu']." | date résolution : ".$probleme[$i]['date_resolution']."</li>";
            echo "</ul>";
        }
    } else {
        for ($i = 0; $i < count($probleme); $i++) {
            echo "<ul>";
            echo "<li>date : ".$probleme[$i]['date']." | statut : ".$statut[$probleme[$i]['statut']]." | sujet : ".$probleme[$i]['sujet']." | contenu : ".$probleme[$i]['contenu']."";
            if ($_SESSION['droit'] == 5){
                $_SESSION['idProbleme'] = $probleme[$i]['id'];
                require("modifStatut.php");
            }
            echo "</li>
                </ul>";
        }
    }
    
}

?>