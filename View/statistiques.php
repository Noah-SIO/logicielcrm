<?php
$managerAssistance = new ManagerAssistance();
$contact = new Contact();
$StatOnContact = $contact->StatOnContact();
$statsNumberOfIssues = $managerAssistance->statsNumberOfIssues();
$statsTimeSolvedIssues = $managerAssistance->statsTimeSolvedIssues();
?>

<h2>Statistiques</h2>
<h3>Nombre de problèmes signalé ces 10 derniers jours:</h3>
<p><?php echo $statsNumberOfIssues ?> problèmes</p>
<h3> Temps de traitement des problèmes :</h3>
<p><?php echo $statsTimeSolvedIssues ?> jours</p>
<h3>Nombre de clients :</h3>
<p><?php echo $StatOnContact['nombreclient'] ?></p>
<h3>Nombre de contacts par jours :</h3>
<p><?php echo $StatOnContact['nombreparjour'] ?></p>
<h3>Nombre de contacts par mois :</h3>
<p><?php echo $StatOnContact['nombreparmois'] ?></p>
