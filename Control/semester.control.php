<?php
    //moduliu metodu kontroliavimas

    include 'Model/semester.php';
    
    $semesterObj = new semester();
    
    $data = $semesterObj->TakeSemester($_GET['semester']);
    
?>

