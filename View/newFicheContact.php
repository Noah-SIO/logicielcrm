<?php
$iduser=1;// a modifier 
$bdsqll = new PDO("mysql:host=localhost;dbname=crm", 'root', '');//même chose
$ContactFiche = new Contact($bdsqll);//même chose
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
    <label for='moyen'>Le Moyen de Contact :</label><br>    
    <select name="moyen">
    <option value="">--Choisissez un Moyen de Contact--</option>
    <option value=1>Fixe</option>
    <option value=2>Portable</option>
    <option value=3>Mail</option>
    </select></br></br>
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