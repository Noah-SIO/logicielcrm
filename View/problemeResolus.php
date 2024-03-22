<?php 

require_once('../Class/assistance.php');

?>
<html>
    <form method="post">
            <label for="nombre2"> Pour rechercher les problèmes résolus </label></br>
            <input type="number" name="nombre2" id="nombre2" placeholder="entrer un chiffre"></br>
            <input type="submit" name="rechercher" id='rechercher' value='Rechercher'></br>
    </form>
</html>
<?php

if (isset($_POST['nombre2'])){
    $testManager = new ManagerAssistance();
    $testManager -> getSolvedIssues($_POST['nombre2']);
}

?>