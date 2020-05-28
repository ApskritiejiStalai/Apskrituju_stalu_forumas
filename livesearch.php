
<?php
session_start();
if (!isset($_SESSION['logged'])) {
    $_SESSION['access'] = false;
    header("Location: index.php");
    die();
}
include('Control/module.control.php');

$content = "<pages>";
foreach($data as $key => $val)
{
    $content .= "<link>" . "<title>" . $val['Kodas'] . " " . $val['Pavadinimas'] . "</title>" . "<url>" .
            "/ASF/komentarai.php?semester=" . $val['Semestras'] . "&amp;id=" . $val['Kodas'] . "&amp;name=" . $val['Pavadinimas'] . "</url>" . "</link>";
}
$content .= "</pages>";

$xmlDoc=new DOMDocument();
$xmlDoc->loadXML($content);

$x=$xmlDoc->getElementsByTagName('link');

//get the q parameter from URL
$q=$_GET["q"];

//lookup all links from the xml file if length of q>0
if (strlen($q)>0) {
  $hint="";
  for($i=0; $i<($x->length); $i++) {
    $y=$x->item($i)->getElementsByTagName('title');
    $z=$x->item($i)->getElementsByTagName('url');
    if ($y->item(0)->nodeType==1) {
      //find a link matching the search text
      if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) {
        if ($hint=="") {
          $hint="<a href='" .
          $z->item(0)->childNodes->item(0)->nodeValue .
          "' target='_self'>" .
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
        } else {
          $hint=$hint . "<br /><a href='" .
          $z->item(0)->childNodes->item(0)->nodeValue .
          "' target='_self'>" .
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
        }
      }
    }
  }
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
  $response="nėra sutampančių";
} else {
  $response=$hint;
}

//output the response
echo $response;
?> 