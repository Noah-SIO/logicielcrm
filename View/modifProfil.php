<html>

    <?php 
    $utilisateurProfil = new ManagerUtilisateur();
    $user = $utilisateurProfil -> GetUserById($_GET['id']);
    ?>

    <form method="post">
        <fieldset>
            <legend>Formulaire de modification de profil</legend>
            <label for="nom">Nom</label></br>
            <input type="text" name="nom" id="nom" value="<?php echo $user[0]['nom'] ?>"></br>
            <label for="prenom">Prénom</label></br>
            <input type="text" name="prenom" id="prenom" value="<?php echo $user[0]['prenom'] ?>"></br>
            <label for="login">Identifiant</label></br>
            <input type="text" name="login" id="login" value="<?php echo $user[0]['identifiant'] ?>"></br>
            <label for="mdp">Mot de passe</label></br>
            <input type="text" name="mdp" id="mdp" placeholder="ex : davidDUPONT1234"></br>
            <label for="droit">Droit (poste)</label></br>
            <select name="droit" id="pet-select">
                <option value=1 <?php if ($user[0]['droit'] == 1) { echo 'selected'; } ?>>Conseiller client</option>
                <option value=2 <?php if ($user[0]['droit'] == 2) { echo 'selected'; } ?>>Manager</option>
                <option value=3 <?php if ($user[0]['droit'] == 3) { echo 'selected'; } ?>>Commercial</option>
                <option value=4 <?php if ($user[0]['droit'] == 4) { echo 'selected'; } ?>>Comptable</option>
                <option value=5 <?php if ($user[0]['droit'] == 5) { echo 'selected'; } ?>>Responsable informatique</option>
                <option value=6 <?php if ($user[0]['droit'] == 6) { echo 'selected'; } ?>>Directeur général</option>
            </select>
            <input type="submit" name="rechercher" id='rechercher' value='Modifier' class="button"></br>
        </fieldset>           
    </form>
</html>
<?php

if (isset($_POST['rechercher'])) {
    if ($_POST['mdp'] == "") {
        $mdp = $user[0]['mdp'];
    }
    $utilisateur = new Utilisateur($_GET['id'], $_POST['nom'], $_POST['prenom'], $_POST['login'], $mdp, $_POST['droit']);
    
    $utilisateurProfil -> ModifyUser($utilisateur);
    echo"yes";
}

?>