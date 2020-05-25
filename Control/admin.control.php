<?php

include 'Model/admin.php';
include 'Control/http_build_url.control.php';
$adminObj = new admin();

$newComments = $adminObj->newComments(); //paimami nauji pranesimai

?>