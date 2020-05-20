<?php
//Upvote ideda i duomenu baze
if (isset($_POST['modulis']) && isset($_POST['komentaras'])) {
    include 'http_build_url.control.php';
    include '../Model/comment.php';
    session_start();

    $commentObj = new comment();
    $commentObj->Upvote($_POST['upvote'], $_POST['modulis'], $_POST['komentaras']);
} else {
    include 'Control/http_build_url.control.php';
    include 'Model/comment.php';

    $commentObj = new comment();
    
    $module_id = $_GET['id'];
    
    //Ideda komentara i duomenu baze
    if (isset($_POST['komentuoti'])) {
        $commentObj->InsertComment($module_id, $_POST['komentaras']);
        header("Refresh:0");
    }

    $commentExists = $commentObj->commentExist($module_id); //tikrinama ar parase komentara studentas

    $upvoteExists = $commentObj->upvoteExist($module_id); //tikrinama ar upvotino studentas

    $myComment = $commentObj->getComment($module_id); //pasiimu savo palaikinta komentara
    //puslapiu numeravimas

    $page = 1;
    $limit = 7; //viename puslapyje irasu skaicius
    $rows = $commentObj->ElementsCount($_GET['id']); //kiek bus irasu vaizduojama
    $pages = ceil($rows / $limit); //kiek bus puslapiu

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    //jei nurodytas per didelis numeris, metamas i paskutini puslapi
    if ($page > $pages) {
        $page = $pages;
    //gaunamas atsiustas naujas puslapio numeris
    }if ($page < 1) {
        $page = 1;
    }

    $offset = ($page - 1) * $limit;

    $data = $commentObj->TakeComment($_GET['id']/*, $offset, $limit*/); //paimami irasai
    //pakeicia url su naujo puslapio numeriu
    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $parts = parse_url($url) + array('query' => array());
    parse_str($parts['query'], $query);
    $query['page'] = $page;
    $parts['query'] = http_build_query($query);
    $newUrl = http_build_url($parts);
}

/*$data = $commentObj->TakeComment($_GET['id']); //paimami irasai
$prev = null;
$rodyti = false;
$pirmas = true;
$test_array = array();
$i = 0;
foreach($data as $key => $val){
    if($upvoteExists != null){
    if( ($myComment == $prev && $_SESSION['id'] == $val['laikintojas']) ||
        ($pirmas && $_SESSION['id'] == $val['laikintojas']) ||
        ($myComment == $val['Komentaras'] && $_SESSION['id'] == $val['laikintojas'])){
            $rodyti = true;
    }
    else if($val['Komentaras'] != $prev && $val['Komentaras'] != $myComment){
        $rodyti = true;
    }
    }
    else{
        if($val['Komentaras'] != $prev && $val['Komentaras'] != $myComment){
            $rodyti = true;
        }
    }

    $prev = $val['Komentaras'];
    $pirmas = false;
    $rodyti = false;
}*/

?>


