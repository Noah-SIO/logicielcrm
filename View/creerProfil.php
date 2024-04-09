<html>
    <?php
if (isset($_POST['nom'], $_POST['prenom'], $_POST['login'], $_POST['mdp'], $_POST['droit'])){
    $utilisateur = new Utilisateur(NULL,$_POST['nom'], $_POST['prenom'], $_POST['login'], $_POST['mdp'], $_POST['droit']);
    $utilisateurProfil = new ManagerUtilisateur();
    $utilisateurProfil -> addUser($utilisateur);
    echo "<strong><p>-----------------------Utilisateur créé avec Succès !!!--------------------</p></strong>";
    //echo "<script>setTimeout(function(){location.reload(); },3000);</script>";
}
?>
    <form method="post">
        <fieldset>
            <legend>Formulaire de création de profil</legend>
            <label for="nom">Nom</label></br>
            <input type="text" name="nom" id="nom" placeholder="ex : David"></br>
            <label for="prenom">Prénom</label></br>
            <input type="text" name="prenom" id="prenom" placeholder="ex : Dupont"></br>
            <label for="login">Identifiant</label></br>
            <input type="text" name="login" id="login" placeholder="ex : daponT"></br>
            <label for="mdp">Mot de passe</label></br>
            <input type="text" name="mdp" id="mdp" placeholder="ex : davidDUPONT1234"></br>
            <label for="droit">Droit (poste)</label></br>
            <select name="droit" id="droit">
                <option value="">- Choisir un droit -</option>
                <option value=1>Conseiller client</option>
                <option value=2>Manager</option>
                <option value=3>Commercial</option>
                <option value=4>Comptable</option>
                <option value=5>Responsable informatique</option>
                <option value=6>Directeur général</option>
            </select>
            <input type="submit" name="rechercher" id='rechercher' value='Créer'></br>
        </fieldset>           
    </form>
</html>
<?php



?>