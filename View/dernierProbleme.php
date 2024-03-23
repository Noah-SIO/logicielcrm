<html>
    <form method="post">
        <label for="nombre">Pour rechercher les derniers problèmes ajoutés</label></br>
        <input type="number" name="nombre" id="nombre" placeholder="entrer un chiffre"></br>
        <input type="submit" name="rechercher" id='rechercher' value='Rechercher'></br>           
    </form>
</html>
<?php

if (isset($_POST['nombre'])){
    $dernierProbleme = new ManagerAssistance();
    $dernierProbleme -> getLastIssues($_POST['nombre']);
}

?>