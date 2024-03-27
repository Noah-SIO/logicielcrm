<?php
if(isset($_GET['file'])){
    header("Content-Disposition: attachement; filename= " .basename($_GET['file']));
    readfile($_GET['file']);
    exit();
}
?>

