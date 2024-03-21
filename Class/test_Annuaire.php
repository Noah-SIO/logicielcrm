<?php 
require_once('Annuaire.php');
$bdsqll = new PDO("mysql:host=localhost;dbname=crm", 'root', '');
$test = new ManagerAnnuaire($bdsqll);
?>
<html>
    <form method="post">
            <label for="recherche"> Entré une Recherche : </label></br>
            <input type="text" name="recherche"></br>
            <!--<label for="type"> Entré un Type de valeurs(nom,prenom,identifiants) : </label></br>
            <input type="text" name="type"></br>-->
            <select name="choosetype" id="selecttype">
            <option value="">--Please choose an option--</option>
            <option value="type">Type</option>
            <option value="valeur de contact">Valeur de Contact</option>
            </select>
            <input type="submit" name="rechercher" id='rechercher' value='Rechercher'>  </br></br>
            
    </form>
</html>
<?php
if (isset($_POST['recherche'])&&isset($_POST['choosetype'])){
    if($_POST['recherche'] != NULL){
    $test->SearchAnnuaireByType($_POST['recherche'],$_POST['choosetype']);
    echo"true";//test
    }
}

// test fonction modifier Annuaire || Romain
echo "---------test fonction modifier Annuaire || Romain----------";
$annuaire = new Annuaire(null, 2, 2, '0909090909', '2022-10-23');
echo "--anuaire sans modifier--";
var_dump($annuaire);
$annuaire->setValeurDeContact('mail@mail.com');
$Manager = new ManagerAnnuaire($annuaire);
$Manager->updateAnnuaire($annuaire);
var_dump($annuaire);
