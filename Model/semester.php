<?php
//imami moduliai
class semester {

    private $module_table;
    
    public function __construct() {

        $this->module_table = "moduliai";
    }
    
    public function TakeSemester($semester) {
        include 'db.php';
        
        $query = "SELECT * FROM `{$this->module_table}` WHERE `semestras` = '{$semester}'";
        
        $result = mysqli_query($connect, $query);
        
        return $result;
    }
}
?>