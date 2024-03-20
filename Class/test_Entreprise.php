<?php 
require_once('entreprise.php');
$bdsqll = new PDO("mysql:host=localhost;dbname=crm", 'root', '');
$test = new ManagerEntreprise($bdsqll);
?>
<form method="post">
        <p>------------GetClientBySociete Test Noah--------</p>
        <label for="societe">Societe : </label>
        <input type="text" id="societe" name="societe">
        <br>
        <input type="submit" value="Submit">
</form>

<?php
if(isset($_POST['societe'])){
    $test->SearchClientBySociete($_POST['societe']);
    echo"true";

}
?>