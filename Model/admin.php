<?php

class admin {

    private $module_table;
    private $comment_table;
    private $modcom_table;
    private $upvote_table;
    
    public function __construct() {

        $this->module_table = "moduliai";
        $this->comment_table = "komentarai";
        $this->modcom_table = "modulio_komentaras";
        $this->upvote_table = "upvote";
    }

    public function newComments() {
        include 'db.php';
        
        $query = "SELECT `id`, `Data`, `Modulio_id`, `Pavadinimas`, `Semestras` "
                . "FROM `{$this->comment_table}` "
                . "INNER JOIN `{$this->modcom_table}` "
                    . "ON `Komentaro_id` = `id` "
                . "INNER JOIN `{$this->module_table}` "
                    . " ON `Kodas` = `Modulio_id` "
                . "WHERE `Perziureta` = 0";

        $result = mysqli_query($connect,$query);
        if(is_bool($result))
            return false;
        else if (mysqli_num_rows($result) != 0) {
            return $result;
        }
        return false;
    }
}