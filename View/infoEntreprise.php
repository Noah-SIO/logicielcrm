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
    <form>
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
    </form>
<?php
if ($_SESSION['droit'] == 3){
    echo "<a href='?action=modifFicheEntreprise&id=".$idEnt."'><button>Modifier la fiche</button></a>";
}
