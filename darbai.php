<?php
$filename = "Padaryti.pdf"; 

        // Header content type 
        header("Content-type: application/pdf"); 

        header("Content-Length: " . filesize($filename)); 
        
        readfile($filename);
        
?>