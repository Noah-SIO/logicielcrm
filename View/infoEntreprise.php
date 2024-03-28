<?php
$entreprise = new ManagerEntreprise();
$idEnt = $_GET('id');
$entreprise -> getEntreprise($idEnt);
$entreprise -> getAnnuaireEntreprise($entreprise -> $idEnt);

$typeEntreprise = $entreprise -> getAnnuaireEntreprise($idEnt)[0]['type'];

$fichier = new ManagerFichier();
$fichier = $fichier -> GetFichierByClient($idEnt);
?>
<form>
    <fieldset>
        <legend>Fiche entreprise</legend>
            <ul>
                <li><b>Nom :</b> <?php echo $entreprise -> getEntreprise($idEnt)[0]['nom'] ?></li>
                <li><b>Prénom :</b> <?php echo $entreprise -> getEntreprise($idEnt)[0]['prenom'] ?></li>
                <li><b>Société :</b> <?php echo $entreprise -> getEntreprise($idEnt)[0]['societe'] ?></li>
                <li><b>Poste :</b> <?php echo $entreprise -> getEntreprise($idEnt)[0]['poste'] ?></li>
                <li><b>ID commercial :</b> <?php echo $entreprise -> getEntreprise($idEnt)[0]['id_commercial'] ?></li>
                <li><b>Date d'ajout :</b> <?php echo $entreprise -> getEntreprise($idEnt)[0]['date'] ?></li>
                <li><b><?php if ($typeEntreprise == 1 || $typeEntreprise == 2) echo $type[$typeEntreprise]." :</b> ".$entreprise -> getAnnuaireEntreprise($entreprise -> getEntreprise($idEnt))[0]['valeur_contact'] ?></li>
                <li><b><?php if ($typeEntreprise == 3){ echo $type[$typeEntreprise]." :</b> ".$entreprise -> getAnnuaireEntreprise($entreprise -> getEntreprise(1$idEnt))[0]['valeur_contact']; } else { echo "Pas d'email enregistré </b>"; } ?></li>
                <li><b>Fichier(s) lié(s) :</b> <?php foreach ($fichier as $values) { echo $values -> getNom()." | ".$values -> getDate()." | ".$values -> getLienDoc(); } ?></li>
            </ul>
    </fieldset>
</form>
