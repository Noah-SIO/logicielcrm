<?php
require_once("../class/entreprise.php");
$entreprise = new ManagerEntreprise();
$entreprise -> getAllEntreprise();
$entreprise -> getAnnuaireEntreprise($entreprise -> getAllEntreprise()[0]['id']);

$typeEntreprise = $entreprise -> getAnnuaireEntreprise($entreprise -> getAllEntreprise()[0]['id'])[0]['type'];

$idEnt = $entreprise -> getAllEntreprise()[0]['id'];

$fichier = new ManagerFichier();
$fichier = $fichier -> GetFichierByClient($idEnt);
?>
<form>
    <fieldset>
        <legend>Fiche entreprise</legend>
            <ul>
                <li><b>Nom :</b> <?php echo $entreprise -> getAllEntreprise()[0]['nom'] ?></li>
                <li><b>Prénom :</b> <?php echo $entreprise -> getAllEntreprise()[0]['prenom'] ?></li>
                <li><b>Société :</b> <?php echo $entreprise -> getAllEntreprise()[0]['societe'] ?></li>
                <li><b>Poste :</b> <?php echo $entreprise -> getAllEntreprise()[0]['poste'] ?></li>
                <li><b>ID commercial :</b> <?php echo $entreprise -> getAllEntreprise()[0]['id_commercial'] ?></li>
                <li><b>Date d'ajout :</b> <?php echo $entreprise -> getAllEntreprise()[0]['date'] ?></li>
                <li><b><?php if ($typeEntreprise == 1 || $typeEntreprise == 2) echo $type[$typeEntreprise]." :</b> ".$entreprise -> getAnnuaireEntreprise($entreprise -> getAllEntreprise()[0]['id'])[0]['valeur_contact'] ?></li>
                <li><b><?php if ($typeEntreprise == 3){ echo $type[$typeEntreprise]." :</b> ".$entreprise -> getAnnuaireEntreprise($entreprise -> getAllEntreprise()[0]['id'])[0]['valeur_contact']; } else { echo "Pas d'email enregistré </b>"; } ?></li>
                <li><b>Fichier(s) lié(s) :</b> <?php foreach ($fichier as $values) { echo $values -> getNom()." | ".$values -> getDate()." | ".$values -> getLienDoc(); } ?></li>
            </ul>
    </fieldset>
</form>

