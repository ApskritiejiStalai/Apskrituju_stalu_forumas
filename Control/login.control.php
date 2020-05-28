<?php
    //loginu metodu kontroliavimas
    include 'Model/login.php';
    include 'Control/http_build_url.control.php';
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
            case "user":{
                $_SESSION['user'] = "student";
                $_SESSION['name'] = $username;
                header("Location: index.php?login=user");
                exit();
            }
                break;
            case "admin":
                $_SESSION['user'] = "admin";
                $_SESSION['name'] = $username;
                header("Location: index.php?login=admin");
                exit();
            default:
                $_SESSION['loginFailed'] = true;
                header("Location: index.php");
                exit();
        }
    }
?>