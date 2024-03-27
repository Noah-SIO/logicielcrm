<html>
    <form method="post">
            <label for="nombreContact">Pour afficher les contacts</label></br>
            <input type="number" name="nombreContact" id="nombreContact" placeholder="entrer un chiffre">
            <label for="filtre">trié par</label>
            <select name="filtre" id="filtre">
                <option value=date>date</option>
                <option value=moyen_contact>moyen de contact</option>
            </select>
            <label for="ordre">par ordre</label>
            <select name="ordre" id="ordre">
                <option value=ASC>croissant</option>
                <option value=DESC>décroissant</option>
            </select>
            <input type="submit" name="connection" id='connection' value='Rechercher'></br>
    </form>
</html>
<?php

if (isset($_POST['nombreContact'])){
    $listeContact = new Contact();
    $listeContact -> getContact($_POST['nombreContact'], $_POST['filtre'], $_POST['ordre']);
    $lC = $listeContact -> getContact($_POST['nombreContact'], $_POST['filtre'], $_POST['ordre']);
    if ($lC != NULL){
        echo "<table>
        <tr>
        <th scope='col'>ID utilisateur associé</th>
        <th scope='col'>ID entreprise associé</th>
        <th scope='col'>Moyen de contact</th>
        <th scope='col'>Demande</th>
        <th scope='col'>Réponse</th>
        <th scope='col'>Date</th>
        </tr>";
        for ($i = 0; $i < count($lC); $i ++){
            echo "<tr>
                    <td>".$lC[$i]['id_utilisateur']."</td>
                    <td>".$lC[$i]['id_entreprise']."</td>
                    <td>".$type[$lC[$i]['moyen_contact']]."</td>
                    <td>".$lC[$i]['demande']."</td>
                    <td>".$lC[$i]['reponse']."</td>
                    <td>".$lC[$i]['date']."</td>
                    </tr>";           
        }
        echo "</table>";
    }
}

?>