<?php
//imami duomenys prisijungimui
class edit {

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

    public function TakeComment($comment_id) {
        include 'db.php';
        
        $query = "SELECT `id`, `Komentaras`, `Upvote`, `Perziureta`, `Data`"
                . "FROM `{$this->comment_table}` "
                . "WHERE `id`='{$comment_id}' ";

        $result = mysqli_query($connect,$query);
        if(is_bool($result))
            return false;
        else if (mysqli_num_rows($result) != 0) {
            return $result;
        }
        return false;
    }
    
    public function EditComment($comment_id, $comment){
        include 'db.php';
        
         $query = "UPDATE `{$this->comment_table}` "
                    . "SET `Komentaras`= '{$comment}',"
                    . "`Perziureta` = 1 " 
                    . "WHERE `id` = '{$comment_id}'";
                    
         $result = mysqli_query($connect, $query); 
    }
    
    public function DeleteComment($comment_id){
        include 'db.php';
        
        
        //-----------------PAGRINDINIO KOMENTARO SALINIMAS
        $query = "DELETE FROM `{$this->comment_table}` "
                    . "WHERE `id` = '{$comment_id}'";
                    
        $result = mysqli_query($connect, $query);
        
        //-------------------MODULIO_KOMENTARAS LENTELES SALINIMAS
        $query = "DELETE FROM `{$this->modcom_table}` "
                    . "WHERE `Komentaro_id` = '{$comment_id}'";
                    
        $result = mysqli_query($connect, $query);
        
        //-------------------UPVOTE LENTELES SALINIMAS
        $query = "DELETE FROM `{$this->upvote_table}` "
                    . "WHERE `Komentaras_id` = '{$comment_id}'";
                    
        $result = mysqli_query($connect, $query);
    }
}