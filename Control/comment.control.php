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
        $existing = $commentObj->CheckIfExists($_POST['komentaras']);

        if ($existing) {
            $_SESSION['exists'] = true;
            header("Refresh:0");
            die();
        } else {
            $commentObj->InsertComment($module_id, $_POST['komentaras']);
            header("Refresh:0");
            die();
        }
    }

    $commentExists = $commentObj->commentExist($module_id); //tikrinama ar parase komentara studentas

    $upvoteExists = $commentObj->upvoteExist($module_id); //tikrinama ar upvotino studentas

    $myComment = $commentObj->getComment($module_id); //pasiimu savo palaikinta komentara
    //puslapiu numeravimas

    $data = $commentObj->TakeComment($_GET['id']); //paimami irasai
    $dataTransfered; //atfiltruoti irasai kad nesikartotu palaikinti keli

    if ($data != false) {
        $prev = null;
        $rodyti = true;
        $pirmas = true;
        $countOfNewData = 0;

        for ($i = 0; $i < sizeof($data); $i++) { //atfiltruoja pasikartojancius komentarus
            if ($upvoteExists != null) {
                if (($myComment == $prev && $_SESSION['id'] == $data[$i]['laikintojas']) ||
                        ($pirmas && $_SESSION['id'] == $data[$i]['laikintojas']) ||
                        ($myComment == $data[$i]['Komentaras'] && $_SESSION['id'] == $data[$i]['laikintojas'])) {

                    $dataTransfered[$countOfNewData++] = $data[$i];
                } else if ($data[$i]['Komentaras'] != $prev && $data[$i]['Komentaras'] != $myComment) {

                    $dataTransfered[$countOfNewData++] = $data[$i];
                }
            } else {
                if ($data[$i]['Komentaras'] != $prev && $data[$i]['Komentaras'] != $myComment) {

                    $dataTransfered[$countOfNewData++] = $data[$i];
                }
            }

            $prev = $data[$i]['Komentaras'];
            $pirmas = false;
        }

        $data = $dataTransfered;
        unset($dataTransfered);
        
        for ($i = 0; $i < sizeof($data); $i++) {//jei prisijunges studentas parase komentara, jis bus pirmas
            if ($commentExists && $data[$i]['Studento_id'] == $_SESSION['id']) {
                $temp = $data[$i];//mano komentaras
                unset($data[$i]);
                array_unshift($data, $temp);
                break;
            }
        }
    }



    $page = 1; //puslapio numeris
    $limit = 10; //viename puslapyje irasu skaicius
    if ($data != false) {
        $rows = sizeof($data); //kiek is viso irasu per puslapius turi but
    } else
        $rows = 0;

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

    $end = $offset + $limit;

    //pakeicia url su naujo puslapio numeriu
    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $parts = parse_url($url) + array('query' => array());
    parse_str($parts['query'], $query);
    $query['page'] = $page;
    $parts['query'] = http_build_query($query);
    $newUrl = http_build_url($parts);
}
?>


