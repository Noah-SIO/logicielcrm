<?php
if (isset($_GET['id'])){
    $entreprise = new ManagerEntreprise();
    $idEnt = $_GET['id'];
    // $entreprise -> getEntreprise($idEnt);
    // $entreprise -> getAnnuaireEntreprise($idEnt);

    // $typeEntreprise = $entreprise -> getAnnuaireEntreprise($idEnt)[0]['type'];
    $annuaire = $entreprise -> getAnnuaireEntreprise($idEnt);

    $fichier = new ManagerFichier();
    $fichier = $fichier -> GetFichierByClient($idEnt);
    $utilisateur = new ManagerUtilisateur();

}
    ?>
        <fieldset>
            <legend>Fiche entreprise</legend>
                <ul>
                <?php $user = $utilisateur->GetUserById($entreprise -> getEntreprise($idEnt)['id_commercial']) ?>
                    <li><b>Nom :</b> <?php echo $entreprise -> getEntreprise($idEnt)['nom'] ?></li>
                    <li><b>Prénom :</b> <?php echo $entreprise -> getEntreprise($idEnt)['prenom'] ?></li>
                    <li><b>Société :</b> <?php echo $entreprise -> getEntreprise($idEnt)['societe'] ?></li>
                    <li><b>Poste :</b> <?php echo $entreprise -> getEntreprise($idEnt)['poste'] ?></li>
                    <li><b>ID commercial :</b> <?php echo $user[0]['nom'].", ". $user[0]['prenom'];?></li>
                    <li><b>Date d'ajout :</b> <?php echo $entreprise -> getEntreprise($idEnt)['date'] ?></li>
                    <?php if ($annuaire != NULL){ foreach ($annuaire as $valeur){ echo "<li><b>". $type[$valeur['type']]." :</b> ".$valeur['valeur_contact']; }} else { echo "<li>Pas de moyen de contact</li>"; } ?>
                    <li><b>Fichier(s) lié(s) :</b> <?php if ($fichier != NULL){ foreach ($fichier as $values) { echo $values -> getNom()." | ".$values -> getDate()." | ".$values -> getLienDoc(); }} else { echo "Aucun fichier"; } ?></li>
                </ul>
        </fieldset>
<?php
if ($_SESSION['droit'] == 1 or $_SESSION['droit'] == 2 or $_SESSION['droit'] == 3 or $_SESSION['droit'] == 6){
    echo "<a href='?action=afficherContactsEntreprise&id=" . $idEnt . "'><button class='MINIbutton'>Historique des contacts</button></a>";
    echo "<a href='?action=modifFicheEntreprise&id=".$idEnt."'><button class='MINIbutton'>Modifier la fiche</button></a>";
}

if ($_SESSION['droit'] == 3 || $_SESSION['droit'] == 4){
    echo "<a href='?action=attacheDocument&ident=".$idEnt."'><button class='MINIbutton'>Attacher un document</button></a>";

}
if ($_SESSION['droit'] == 1 || $_SESSION['droit'] == 3){
    $_GET['iddest'] = $entreprise -> getEntreprise($idEnt)['id_commercial'];

    echo "<a href='?action=creerRappel&iddest=".$_GET['iddest']."'><button class='MINIbutton'>Créer un rappel</button></a>";
}
if ($_SESSION['droit'] == 1){
    echo "<a href='?action=creerFicheContact&identreprise=".$entreprise -> getEntreprise($idEnt)['id']."'><button class='MINIbutton'>Ajouter un Contact</button></a>";
}




















