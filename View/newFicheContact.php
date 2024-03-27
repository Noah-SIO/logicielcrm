<?php
$iduser=1;// a modifier 
require_once("../Class/fichecontact.php");///////A supprimer quand constructeur en place 
$bdsqll = new PDO("mysql:host=localhost;dbname=crm", 'root', '');//même chose
$ContactFiche = new Contact($bdsqll);//même chose
require_once('../class/entreprise.php');
$entreprisemanager = new ManagerEntreprise();
$listeEntreprise = $entreprisemanager->getAllEntreprise();?>
<h1>Formulaire Création de Fiche Contact</h1>
<form method='post'>
     <label for="idEntreprise">Entreprise:</label>
    <select name="idEntreprise" id="idEntreprise">
        <?php foreach ($listeEntreprise as $entreprise) : ?>
            <option value="<?php echo $entreprise->getId();?>">
                <?php echo $entreprise->getSociete(); ?> (<?php echo $entreprise->getNom(); ?>)
            </option>
        <?php endforeach; ?>
        </select><br><br>
<label for='moyen'>Le moyen de contact (Telephone Fixe 1, Smartphone 2, Email 3) :</label><br>
<input type='number' name='moyen' placeholder='ex : 0606060606 (2)' min='1' max='3' required width='100'><br><br>
<label for='dem'>La demande :</label><br>
<input type='text' name='dem' placeholder='ex : problème d’impression' required><br><br>
<label for='rep'>Et la réponse :</label><br>
<textarea id='rep' name='rep' rows='7' cols='50' placeholder='Nous vous envoyons les données par e-mail' required></textarea><br><br>
<input type='submit' name='valider'class='button' value='Creer le Contact'>
<?php
echo"</form>";
if (isset($_POST['valider'])) {
    $newContact = new FicheContact(null,$iduser,$_POST['idEntreprise'],date('Y-m-d'),$_POST['dem'],$_POST['rep'],$_POST['moyen']);
    $ContactFiche->createFicheContact($newContact);
    echo"<p>Fiche Contact Creer avec Succès !!!</p>";
}
?>