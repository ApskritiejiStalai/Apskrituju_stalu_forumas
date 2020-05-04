<?php
//imami duomenys prisijungimui
class Login {

    private $admin_table;
    private $user_table;
    
    public function __construct() {

        $this->admin_table = "admin_login";
        $this->user_table = "student_login";
    }

    public function TryLogin($username, $password) {
        include 'db.php';
        
        $result = $this->TryUser($username, $password, $connect);
        
        if (mysqli_num_rows($result) != 0) {
            $_SESSION['logged'] = true;
            $_SESSION['who'] = 'user';
            foreach($result as $rez)
                $_SESSION['id'] = $rez['Vidkodas'];
            return "user";
        }
        
        $result = $this->TryAdmin($username, $password, $connect);
        
        if (mysqli_num_rows($result) != 0) {
            $_SESSION['logged'] = true;
            $_SESSION['who'] = 'admin';
            foreach($result as $rez)
                $_SESSION['id'] = $rez['Admin_id'];
            return "admin";
        } 
        
        return "fault";
    }

    private function TryUser($username, $password, $connect) {

        $query = "SELECT `Vidkodas` FROM `{$this->user_table}` WHERE `Slapyvardis`='{$username}' AND `Slaptazodis`='{$password}'";
 
        $result = mysqli_query($connect,$query);
        
        return $result;
    }

    private function TryAdmin($username, $password, $connect) {

        $query = "SELECT `Admin_id` FROM `{$this->admin_table}` WHERE `Slapyvardis`='{$username}' AND `Slaptazodis`='{$password}'";

        $result = mysqli_query($connect,$query);

        return $result;
    }

}

?>