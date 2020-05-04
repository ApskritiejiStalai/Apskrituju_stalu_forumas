<?php
    //moduliu metodu kontroliavimas

    include 'Model/module.php';

    $moduleobj = new module();
    
    $data = $moduleobj->TakeModule($_GET['semester']);
    
?>

