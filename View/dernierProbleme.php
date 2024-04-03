<!-- 
<html>
    <form method="post">
        <input type="submit" name="rechercher" id='rechercher' value='Rechercher'></br>           
    </form>
</html> -->
<?php
echo "<h3>Pour rechercher les derniers problèmes ajoutés</h3>";
echo "<hr>";
if (isset($_POST['nombre'])){
    $dernierProbleme = new ManagerAssistance();
    $dernierProbleme -> getLastIssues(5);
}
echo "</br></br>";

?>