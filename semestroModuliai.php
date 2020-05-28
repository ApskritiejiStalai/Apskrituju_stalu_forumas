<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['logged'])) {
    $_SESSION['access'] = false;
    header("Location: index.php");
    die();
}

include('Control/login.control.php');
include('Control/semester.control.php');
?>
<html lang="lt">
    <head>
        <title>ASF MODULIAI</title>
        <link rel="icon" href="assets/img/icon.png">
        <meta charset="utf-8" />
        <!--<link rel="icon" href="favicon.png" type="image/x-icon" />-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <link href="css/vendor/bootstrap.css" rel="stylesheet" />
        <link href="css/vendor/font-awesome.css" rel="stylesheet" />
        <link href="css/vendor/slick.css" rel="stylesheet" />
        <link href="css/vendor/slick-theme.css" rel="stylesheet" />
        <link href="css/main.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/moduliuStyle.css">
        <link rel="stylesheet" type="text/css" href="css/login.css">

        <script>
            function showResult(str) {
                if (str.length == 0) {
                    document.getElementById("livesearch").innerHTML = "";
                    document.getElementById("livesearch").style.border = "0px";
                    return;
                }
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {  // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("livesearch").innerHTML = this.responseText;
                        document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
                    }
                }
                xmlhttp.open("GET", "livesearch.php?semester=<?php echo $_GET['semester']; ?>&q=" + str, true);
                xmlhttp.send();
            }
        </script>
    </head>
    <body>

        <header>

            <div class="containerH">
                <div class="logo">
                    <a href="index.php"><img src="assets/img/logobalta.png" alt="" /></a>
                </div>
                <div class="menu">
                    <ul>
                        <li><a style="margin-top: 17px; font-weight:bold;" href="index.php">Pagrindinis</a></li>
                        <li><a style="margin-top: 17px; font-weight:bold;" href="semestrai.php" class="active">Semestrai</a></li>
                        <li>&nbsp;</li>
                        <?php if (isset($_SESSION['name'])) { ?>
                            <ui style="float: left; margin-top: 5px; " class="logas pull-right">
                                <a  class="fa fa-user fa-1x" aria-hidden="true">
                                    <a style="font-family: 'Open Sans';text-transform: uppercase; font-size: 14px; font-weight:bold;">
                                        <?php
                                        if (isset($_SESSION['name'])) {
                                            echo nl2br($_SESSION['user'] . "\r\n" . $_SESSION['name']);
                                        }
                                        ?>
                                    </a>
                                </a>
                            </ui>
                        <?php } ?>
                        <li><?php if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) { ?>
                                <div class="pullRight">
                                    <form action="" method="post">
                                        <button  style="width:auto;" type="logout" name="logout">Atsijungti</button>
                                    </form>
                                </div>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
                <div class="mobile-menu"><i class="fa fa-bars"></i></div>
            </div>


        </header>

        <div class="intro-page" style="background-image: url('assets/img/backgr.jpg')">
            <div class="container">
                <h1><?php echo $_GET['semester']; ?>  semestro moduliai</h1>  <!-- cia reikia kad vietoj zvaigzdutes semetro numeri rodytu ar pilna pavadinima --> 
            </div>
        </div>
        <!--//-----bruksniukais padaryt kelia iki sito failo kaip db labore: pradzia > failas1 > failas2 > dabartinis----------------------------------------->
        <ul class="pagePath">
            <li><a href='index.php'>Pradžia</a></li>
            <li><a href='semestrai.php'>Semestrai</a><li>
        </ul>
        <!--//--------------------------------->
        <!--<div class="wrapper">-->
        <div class="search box">
            <input type="search" name="box" onkeyup="showResult(this.value)" placeholder="Suraskite modulį, įvesdami pavadinimą arba kodą" />
            <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
        </div>
        <div style="align-self: center; border: 0;" class="info" id="livesearch" ></div> 

        <section class="four-elements">
            <div class="container">
                <div> <!--class="row col-lg-8"-->
                    <!--<div class="col-md-3">-->
                    <!--<div class="four-elements--image"></div>-->
                    <table class="semester">
                        <tr>
                            <th>Kodas</th>
                            <th>Dalyko pavadinimas</th>
                        </tr>
                        <?php foreach ($data as $key => $var) {
                            ?>
                            <tr>
                                <td> <a href="komentarai.php?semester=<?php echo $_GET['semester']; ?>&id=<?php echo $var['Kodas']; ?>&name=<?php echo $var['Pavadinimas']; ?>" ><?php echo $var['Kodas']; ?> </td>
                                <td> <a href="komentarai.php?semester=<?php echo $_GET['semester']; ?>&id=<?php echo $var['Kodas']; ?>&name=<?php echo $var['Pavadinimas']; ?>" ><?php echo $var['Pavadinimas']; ?> </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </section>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <ul>
                            <li><a href="https://www.facebook.com/ktu.lt"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://twitter.com/ktuspace"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.linkedin.com/school/ktu/"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="https://www.youtube.com/user/ktuvideo"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <p><a href="https://ktu.edu/">Kauno technologijos universitetas</a></p>
                    </div>
                </div>
            </div>
        </footer>

        <script type="text/javascript">
            window.odometerOptions = {
                format: '(,ddd)',
            };
        </script>
        <script src="js/vendor/jquery-3.1.0.min.js"></script>
        <script src="js/vendor/jquery.easing.min.js"></script>
        <script src="js/vendor/tether.js"></script>
        <script src="js/vendor/bootstrap.js"></script>
        <script src="js/vendor/slick.js"></script>
        <script src="js/vendor/isotope.pkgd.min.js"></script>
        <script src="js/vendor/odometer.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
