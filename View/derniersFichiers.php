<?php
echo "<h2>Derniers fichiers</h2>";
$files = new ManagerFichier();
$result = $files->GetFichierByClient($id_entreprise);
echo '<table border="">';
echo '<tr><th>ID</th><th>ID Entreprise</th><th>Nom</th><th>Type</th><th>Lien</th><th>Date</th></tr>';
echo "<hr>";
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
    if ($Code_element = null) {
        echo '<tr>';
        echo '<td>' . $fichier->getId() . '</td>';
        echo '<td>' . $fichier->getIdEntreprise() . '</td>';
        echo '<td>' . $fichier->getNom() . '</td>';
        echo '<td>' . $fichier->getType() . '</td>';
        echo '<td>' . $fichier->getLienDoc() . '</td>';
        echo '<td>' . $fichier->getDate() . '</td>';
        echo '</tr>';
    }
    echo "</br></br>";
}
echo '</table>';
?>