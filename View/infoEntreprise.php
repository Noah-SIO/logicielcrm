<?php
if (isset($_GET['idEnt'])){
    $entreprise = new ManagerEntreprise();
    $idEnt = $_GET['idEnt'];
    $entreprise -> getEntreprise($idEnt);
    $entreprise -> getAnnuaireEntreprise($idEnt);

    $typeEntreprise = $entreprise -> getAnnuaireEntreprise($idEnt)[0]['type'];
    $annuaire = $entreprise -> getAnnuaireEntreprise($idEnt);

    $fichier = new ManagerFichier();
    $fichier = $fichier -> GetFichierByClient($idEnt);
}
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
                    <?php foreach ($annuaire as $valeur){ echo "<li><b>". $type[$valeur['type']]." :</b> ".$entreprise -> getAnnuaireEntreprise($idEnt)[0]['valeur_contact']; } ?>
                    <li><b>Fichier(s) lié(s) :</b> <?php foreach ($fichier as $values) { echo $values -> getNom()." | ".$values -> getDate()." | ".$values -> getLienDoc(); } ?></li>
                   
                </ul>
        </fieldset>
    </form>

