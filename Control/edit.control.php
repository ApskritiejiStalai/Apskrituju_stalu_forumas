<?php

include 'Model/edit.php';
include 'Control/http_build_url.control.php';
$editObj = new edit();

$newComment = $editObj -> TakeComment($_GET['comment']); //paimami nauji pranesimai

if(isset($_POST['redaguoti'])){
    $editObj -> EditComment($_GET['comment'], $_POST['komentaras'], $_SESSION['user']);
    header("Location: komentarai.php?semester=". $_GET['semester'] ."&id=". $_GET['id'] . "&name=". $_GET['name']);
    exit;
}

if(isset($_POST['istrinti'])){
    $editObj -> DeleteComment($_GET['comment']);
    header("Location: komentarai.php?semester=". $_GET['semester'] ."&id=". $_GET['id'] . "&name=". $_GET['name']);
    exit;
}
?>