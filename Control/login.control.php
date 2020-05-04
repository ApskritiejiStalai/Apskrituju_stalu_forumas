<?php
    //loginu metodu kontroliavimas

    include 'Model/login.php';
    
    if(isset($_POST['logout'])){
        session_unset();
        session_destroy();
        header("Location: index.php");
    }
    else if (isset($_POST['submit'])) {

        $username = $_POST['uname'];
        $password = $_POST['psw'];

        $loginAttempt = new Login();

        $result = $loginAttempt->TryLogin($username, $password);

        switch ($result){
            case "user":
                header("Location: index.php?login=user");
                break;
            case "admin":
                header("Location: index.php?login=admin");
                break;
            default:
                header("Location: index.php?login=false");
        }
    }
?>