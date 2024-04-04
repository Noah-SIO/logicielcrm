<?php /*
echo"<form method='post'>";
echo"<input type='submit' name='valider' class='button' value='Contacter un administrateur'/>";
echo"</form>";
 */
?>
<form method='post'>
    <input type='submit' name='valider' class='button' value='Contacter un administrateur'/>
</form>
<?php
if (isset($_POST['valider'])){
    header("Location: ?action=formulaireAssistance");
    //echo "<script>setTimeout(function(){location.reload(); },3000);</script>";
    
}
?>