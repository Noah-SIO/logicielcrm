
<!DOCTYPE html>
<html>
<head>
    <title>Test</title>
</head>
<body>
    <form method="post">
        <label for="idCompte">Id Compte</label>
        <input type="text" id="idCompte" name="idCompte">
        <br>
        <label for="idEntreprise">Id Entreprise</label>
        <input type="text" id="idEntreprise" name="idEntreprise">
        <br>
        <label for="date">Date</label>
        <input type="date" id="date" name="date">
        <br>
        <label for="moyenDeContact">Moyen de Contact</label>
        <input type="text" id="moyenDeContact" name="moyenDeContact">
        <br>
        <label for="demande">Demande</label>
        <textarea id="demande" name="demande"></textarea>
        <br>
        <label for="reponse">Reponse</label>
        <textarea id="reponse" name="reponse"></textarea>
        <br>
        <label for="support">Support</label>
        <textarea id="support" name="support"></textarea>
        <br>
        <label for="resume">Resume</label>
        <textarea id="resume" name="resume"></textarea>
        <br>
        <input type="submit" value="Submit">
        <p>-----------------------Test get Contact Noah-------------------------------------- </p>
        <label for="nbr"> Entré un Nombre de Contact : </label></br>
            <input type="text" name="nbr"></br>
            <input type="submit" name="rechercher" id='rechercher' value='Rechercher'>  </br></br>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require_once('fichecontact.php');
        $idCompte = $_POST["idCompte"];
        $idEntreprise = $_POST["idEntreprise"];
        $date = $_POST["date"];
        $moyenDeContact = $_POST["moyenDeContact"];
        $demande = $_POST["demande"];
        $reponse = $_POST["reponse"];
        $support = $_POST["support"];
        $ficheDeContact = new FicheContact($idCompte, $idEntreprise, $date, $moyenDeContact, $demande, $reponse, $support);
        
        $contact = new Contact();
        $contact->createFicheContact($ficheDeContact);
    }
    if (isset($_POST['nbr'])){
        if($_POST['nbr'] != NULL){
        $test->getContact($_POST['nbr']);
        echo"true";//test
        }
    }
    ?>
</body>
</html>
