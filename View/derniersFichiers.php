<?php
// il faut entrer dans le indexd -> $id_entreprise= 0;//0 pour toute les entreprise
// il faut entrer dans le indexd -> $Code_element=3;// 1pour contrat 2 pour facture 3 pour avoirs
echo "<h2>Derniers fichiers</h2>";
$files = new ManagerFichier();
$result = $files->GetFichierByClient($id_entreprise);
var_dump($result);
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
    echo "</br></br>";
}
echo '</table>';
?>