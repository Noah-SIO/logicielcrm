<html>
    <form method="post">
            <label for="nombreContact">Pour afficher les contacts</label></br>
            <!-- <input type="number" name="nombreContact" id="nombreContact" placeholder="entrer un chiffre"> -->
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
            <input type="submit" name="rechercher" id='rechercher' value='Rechercher'></br>
    </form>
</html>
<?php

if (isset($_POST['filtre'])){
    $listeContact = new Contact();
    $clientContact = new ManagerEntreprise();
    $utilisateurContact = new ManagerUtilisateur();
    
    // $listeContact -> getContact(10, $_POST['filtre'], $_POST['ordre'])['id_utilisateur'];
    $lC = $listeContact -> getContact(10, $_POST['filtre'], $_POST['ordre']);
    
    if ($lC != NULL){
        echo "<table>
        <tr>
        <th scope='col'> Utilisateur associé </th>
        <th scope='col'> Entreprise associé </th>
        <th scope='col'> Moyen de contact </th>
        <th scope='col'> Demande </th>
        <th scope='col'> Réponse </th>
        <th scope='col'> Date </th>
        </tr>";
        for ($i = 0; $i < count($lC); $i ++){
            $entreprise = $clientContact -> getEntreprise($lC[$i]['id_entreprise']);
            $utilisateur = $utilisateurContact -> GetUserById($lC[$i]['id_utilisateur']);
            echo "<tr>
                    <td>".$utilisateur[0]['nom']." ".$utilisateur[0]['prenom']."</td>
                    <td>".$entreprise['societe']."</td>
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