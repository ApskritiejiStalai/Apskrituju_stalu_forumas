<?php
session_start();
if (!isset($_SESSION['logged'])) {
    $_SESSION['access'] = false;
    header("Location: index.php");
    die();
}
$filename = "Padaryti.pdf";

// Header content type 
header("Content-type: application/pdf");

header("Content-Length: " . filesize($filename));

readfile($filename);
?>