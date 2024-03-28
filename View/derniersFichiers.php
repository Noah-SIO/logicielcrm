<?php
$id_entreprise=0;//0 pour toute les entreprise
$Code_element=2;// 1pour contrat 2 pour facture 3 pour avoirs
$files = new ManagerFichier();
$result = $files->GetFichierByClient($id_entreprise);
echo '<table border="">';
echo '<tr><th>ID</th><th>ID Entreprise</th><th>Nom</th><th>Type</th><th>Lien</th><th>Date</th></tr>';
foreach ($result as $fichier) {
    if ($fichier->getType() == $Code_element) {
        echo '<tr>';
        echo '<td>' . $fichier->getId() . '</td>';
        echo '<td>' . $fichier->getIdEntreprise() . '</td>';
        echo '<td>' . $fichier->getNom() . '</td>';
        echo '<td>' . $fichier->getType() . '</td>';
        echo '<td>' . $fichier->getLienDoc() . '</td>';
        echo '<td>' . $fichier->getDate() . '</td>';
        echo '</tr>';
    }
}
echo '</table>';
?>