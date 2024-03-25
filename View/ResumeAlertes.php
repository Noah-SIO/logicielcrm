<?php
session_start();
if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    require_once '../Class/rappelAlerte.php';
    $managerRappelAlerte = new ManagerRappelAlerte();
    $alertes = $managerRappelAlerte->getAlerteRappel($userId);

    if (!empty($alertes)) {
        echo '<table>
                <tr>
                    <th>ID</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                    <th>Type</th>
                    <th>Sujet</th>
                    <th>Contenu</th>
                    <th>Statut</th>
                </tr>';
        foreach ($alertes as $alerte) {
            echo '<tr>
                    <td>' . $alerte->getId() . '</td>
                    <td>' . $alerte->getDateDebut() . '</td>
                    <td>' . $alerte->getDateFin() . '</td>
                    <td>' . $alerte->getType() . '</td>
                    <td>' . $alerte->getSujet() . '</td>
                    <td>' . $alerte->getContenu() . '</td>
                    <td>' . $alerte->getStatut() . '</td>
                </tr>';
        }
        echo '</table>';
    } else {
        echo "<p>Aucune alerte d'enregistrer.</p>";
    }
}
?>
