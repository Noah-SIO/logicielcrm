<html>
    <form method="post">
        <label for="nombre">Les derniers problèmes ajoutés :</label></br>
    <!--    <input type="number" name="nombre" id="nombre" placeholder="entrer un chiffre"></br>
        <input type="submit" name="rechercher" id='rechercher' value='Rechercher'></br>           
    </form> -->
</html>
<?php


    $dernierProbleme = new ManagerAssistance();
    $dernierProbleme -> getLastIssues(10);


?>