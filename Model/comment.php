<?php

//imami duomenys prisijungimui
class comment {

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

    public function TakeComment($module_id) {
        include 'db.php';

        $query = "SELECT `id`, `Komentaras`, `Upvote`, `Perziureta`, TIME(`Data`) as Laikas,  YEAR(`Data`) as Metai, MONTH(`Data`) as Menesis, DAY(`Data`) as Diena, `Up_id`, `Studento_id`, `Studentas_id` as `laikintojas`"
                . "FROM `{$this->comment_table}` "
                . "INNER JOIN `{$this->modcom_table}` "
                . "ON `id`=`Komentaro_id` "
                . "INNER JOIN `{$this->module_table}` "
                . "ON `Kodas`=`Modulio_id` "
                . "LEFT JOIN `{$this->upvote_table}` "
                . "ON `Komentaras_id` = `Komentaro_id`"
                . "WHERE `Kodas`='{$module_id}' "
                . "ORDER BY `Upvote` DESC ";
                
        $result = mysqli_query($connect, $query);
        if (is_bool($result))
            return false;
        else if (mysqli_num_rows($result) != 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        }
        return false;
    }

    public function ElementsCount($module_id) {
        include 'db.php';

        $query = "SELECT COUNT(*) as `kiekis` "
                . "FROM `{$this->comment_table}` "
                . "INNER JOIN `{$this->modcom_table}` "
                . "ON `id`=`Komentaro_id`"
                . "INNER JOIN `{$this->module_table}` "
                . "ON `Kodas`=`Modulio_id` "
                . "WHERE `Kodas`='{$module_id}'";

        $result = mysqli_query($connect, $query);
        foreach ($result as $key => $val)
            $total = $val['kiekis'];
        return $total;
    }

    public function InsertComment($module_id, $comment) {
        include 'db.php';

        $query = "INSERT INTO `{$this->modcom_table}` "
                . "("
                . "`Modulio_id`,"
                . "`Komentaro_id`,"
                . "`Studento_id`"
                . ")"
                . "VALUES "
                . "("
                . "'{$module_id}',"
                . "'null',"
                . "'{$_SESSION['id']}'"
                . ")";

        mysqli_query($connect, $query);

        $query = "SELECT `Komentaro_id` FROM `{$this->modcom_table}` "
                . "WHERE `Modulio_id` = '{$module_id}' "
                . "AND `Studento_id` = '{$_SESSION['id']}'";

        $result = mysqli_query($connect, $query);

        foreach ($result as $key => $val)
            $comment_id = $val['Komentaro_id'];

        $date = date('Y-m-d H:i:s');

        $query = " INSERT INTO `{$this->comment_table}` "
                . "("
                . "`id`,"
                . "`Komentaras`,"
                . "`Upvote`,"
                . "`Perziureta`,"
                . "`Data`"
                . ")"
                . "VALUES "
                . "("
                . "'{$comment_id}',"
                . "'{$comment}',"
                . "'0',"
                . "'0',"
                . "'{$date}'"
                . ")";


        mysqli_query($connect, $query);
    }

    public function Upvote($doesExist, $module_id, $comment_id) {
        include 'db.php';

        if ($doesExist == 0) {
            $action = "+";
        } else {
            $action = "-";
        }
        //////////////////////// PRIDEDA ARBA ATIMA IS BENDRO UPVOTE SKAICIAUS
        $query = "UPDATE `{$this->comment_table}` "
                . "SET `Upvote`=`Upvote` " . $action . " 1 "
                . "WHERE `id` = '{$comment_id}'";

        $result = mysqli_query($connect, $query);

        //////////////////////// PRIDEDA I VISU UPVOTE SARASA
        if ($action == "+") {
            $query = "INSERT INTO `{$this->upvote_table}`"
                    . "("
                    . "`Up_id`, "
                    . "`Modulis_id`, "
                    . "`Komentaras_id`, "
                    . "`Studentas_id`"
                    . ")"
                    . "VALUES"
                    . "("
                    . "0, "
                    . "'{$module_id}', "
                    . "'{$comment_id}', "
                    . "'{$_SESSION['id']}'"
                    . ")";
        } else if ($action == "-") {////////////////PASALINA UPVOTE IS BENDRO SARASO
            $query = "DELETE FROM `{$this->upvote_table}` "
                    . "WHERE `Studentas_id` = '{$_SESSION['id']}' "
                    . "AND `Modulis_id` = '{$module_id}' ";
        }
        $result = mysqli_query($connect, $query);
    }

    public function upvoteExist($module_id) {
        include 'db.php';

        $query = "SELECT `Up_id`"
                . "FROM `{$this->upvote_table}` "
                . "WHERE `Studentas_id` = '{$_SESSION['id']}' "
                . "AND `Modulis_id` = '{$module_id}' ";

        $result = mysqli_query($connect, $query);
        if (!is_bool($result)) {
            foreach ($result as $key => $val)
                $vote_id = $val['Up_id'];
        }
        if (mysqli_num_rows($result) != 0)
            return $vote_id;
        else
            return 0;
    }

    public function commentExist($module_id) {
        include 'db.php';

        $query = "SELECT `Studento_id` "
                . "FROM `{$this->modcom_table}` "
                . "WHERE `Studento_id` = '{$_SESSION['id']}' "
                . "AND `Modulio_id` = '{$module_id}'";

        $result = mysqli_query($connect, $query);

        if (mysqli_num_rows($result) != 0)
            return true;
        else
            return false;
    }

    public function getComment($module_id) {
        include 'db.php';

        $query = "SELECT `Komentaras` "
                . "FROM `{$this->comment_table}` "
                . "INNER JOIN `{$this->upvote_table}` "
                . "ON `Komentaras_id` = `id` "
                . "AND `Studentas_id`='{$_SESSION['id']}' "
                . "WHERE `Modulis_id` = '{$module_id}'";

        $result = mysqli_query($connect, $query);
        if (!is_bool($result)) {
            foreach ($result as $key => $val)
                $text = $val['Komentaras'];
        }
        if (mysqli_num_rows($result) != 0) {
            return $text;
        }
        return false;
    }

    public function CheckIfExists($comment) {
        include 'db.php';

        $query = "SELECT COUNT(`Komentaras`) as kiekis
                    FROM `{$this->comment_table}`
                    WHERE `Komentaras` = '{$comment}'";

        $result = mysqli_query($connect, $query);
        $result = mysqli_fetch_assoc($result);
        if ($result['kiekis'] == 0) {
            return false;
        } else
            return true;
    }

}

?>