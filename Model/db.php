<?php
    //prisijungimas prie duombazes

    $usr = 'root';
    $pwd = '';
    $server = 'localhost';
    $db = 'forumas';
    
    $connect = mysqli_connect($server, $usr, $pwd);
    
    if(!$connect)
            exit('Could not connect to db');
    
    $db=mysqli_select_db($connect, $db);
    
    if(!$db)
            exit('could not find db');
    
?>