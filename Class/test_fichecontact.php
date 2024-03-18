
<!DOCTYPE html>
<html>
<head>
    <title>Test</title>
</head>
<body>
    <!--test pour la fonction createFicheContact|| Romain-->
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
         <!--fin test pour la fonction createFicheContact|| Romain-->
    </form>
    <?php
    /**test pour la fonction createFicheContact|| Romain */
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require_once('fichecontact.php');
        $idCompte = $_POST["idCompte"];
        $idEntreprise = $_POST["idEntreprise"];
        $date = $_POST["date"];
        $moyenDeContact = $_POST["moyenDeContact"];
        $demande = $_POST["demande"];
        $reponse = $_POST["reponse"];
        $ficheDeContact = new FicheContact($idCompte, $idEntreprise, $date, $moyenDeContact, $demande, $reponse);
        
        $contact = new Contact();
        $contact->createFicheContact($ficheDeContact);
    }
/**fin test pour la fonction createFicheContact || Romain */
    ?>
</body>
</html>
