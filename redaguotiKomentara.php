<!DOCTYPE html>
<?php
date_default_timezone_set('Europe/Moscow');
session_start();
include('Control/login.control.php');
include('Control/edit.control.php');
if (!isset($_SESSION['logged']) || !isset($_POST['redagavimas'])) {
    if ($_SESSION['user'] != 'admin') {
        $_SESSION['access'] = false;
        header("Location: index.php");
        die();
    }
}
?>
<html lang="en">
    <head>
        <title>Redagavimas</title>
        <link rel="icon" href="assets/img/icon.png">
        <meta charset="utf-8" />
        <!--<link rel="icon" href="favicon.png" type="image/x-icon" />-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <link href="css/vendor/bootstrap.css" rel="stylesheet" />
        <link href="css/vendor/font-awesome.css" rel="stylesheet" />
        <link href="css/main.css" rel="stylesheet" />
        <!--<link rel="stylesheet" type="text/css" href="css/style.css">-->
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <link rel="stylesheet" type="text/css" href="css/moduliuStyle.css">
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
                        <li><a style="margin-top: 17px; font-weight:bold;" href="semestrai.php">Semestrai</a></li>
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
                <h1><?php echo $_GET['id']; ?> <?php echo $_GET['name']; ?></h1>  
            </div>
        </div>
        <div class="pagePath" style="padding-bottom: 0px;">
            <li><a href='index.php'>Pradžia</a></li>
            <li><a href='semestrai.php'>Semestrai</a>
            <li><a href='semestroModuliai.php?semester=<?php echo $_GET['semester']; ?>'>Moduliai</a></li>
            <li><a href='komentarai.php?semester=<?php echo $_GET['semester']; ?>&id=<?php echo $_GET['id']; ?>&name=<?php echo $_GET['name']; ?>'>Komentarai</a></li>
        </div>
        <?php if (isset($_GET['comment'])) {
            ?>

            <div>
                <section class="four-elements">
                    <div class="container" style="width: 45%">
                        <form action="" method="POST">
                            <table class="tcomments">
                                <tr>
                                    <th>Komentaro redagavimas</th>
                                    <th></th>
                                </tr>
                                <?php foreach ($newComment as $key => $val) { ?>
                                    <tr>
                                        <td> <textarea onkeyup="textCounter(this, 'counter', 150);" id="komentaras" name="komentaras" rows="2" cols="75" required><?php if (!isset($_POST['redaguoti'])) echo $val['Komentaras']; ?></textarea> </td>
                                        <td style="padding-top:0px;"><button type="submit" name="redaguoti" style="size: 100px;">Pateikti</button> </td>
                                        <td style="padding-top:0px;"><button type="submit" name="istrinti" style="size: 100px;">Ištrinti</button> </td>
                                    </tr>
                                <?php } ?>
                            </table>
                            Liko simbolių: <input disabled  maxlength="3" size="3" value="150" id="counter">
                        </form>
                    </div>
                </section>
            </div>

        <?php } ?>
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
        <script>
            function textCounter(field, field2, maxlimit) //simboliu limitas zinutej
            {
                var countfield = document.getElementById(field2);
                if (field.value.length > maxlimit) {
                    field.value = field.value.substring(0, maxlimit);
                    return false;
                } else {
                    countfield.value = maxlimit - field.value.length;
                }
            }
        </script>
    </body>
</html>