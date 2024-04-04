<?php 
$bdsqll = new PDO("mysql:host=localhost;dbname=crm", 'root', '');
$test = new ManagerFichier($bdsqll);
echo"<form method='post'>";
echo"<input type='submit' name='submit' value='Delete Document'>";
echo"</form>";

if(isset($_POST['submit'])){
    $test->deleteDoc($_GET['iduser']);
    echo"Fichier Supprimé...";
    echo "<script>setTimeout(function(){location.reload(); },3000);</script>";
}
?>