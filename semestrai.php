<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['logged'])) {
    $_SESSION['access'] = false;
    header("Location: index.php");
    die();
}
include('Control/login.control.php');
include 'Control/http_build_url.control.php';
?>
<html lang="lt">
    <head>
        <title>ASF SEMESTRAI</title>
        <link rel="icon" href="assets/img/icon.png">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <link href="css/vendor/bootstrap.css" rel="stylesheet" />
        <link href="css/vendor/font-awesome.css" rel="stylesheet" />
        <link href="css/vendor/slick.css" rel="stylesheet" />
        <link href="css/vendor/slick-theme.css" rel="stylesheet" />
        <link href="css/main.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="css/moduliuStyle.css">
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <header>
            <div class="containerH">
                <div >
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
                <h1>Semestrai</h1>
            </div>
        </div>

        <ul class="pagePath">
            <li><a href='index.php'>Pradžia</a></li>
        </ul>
        <section class="four-elements">
            <div class="container">
                <div>
                    <table class="my_table" align="center">
                        <?php for ($i = 1; $i <= 7; $i += 2) { ?>
                            <tr>
                                <th colspan="2"><a href="semestroModuliai.php?semester=<?php echo $i; ?>" class="button"><?php echo $i; ?> Semestras</a></th>
                                <th rowspan="4" width="100px"></th>
                                <?php if ($i < 7) { ?> <th colspan="2"><a href="semestroModuliai.php?semester=<?php echo $i + 1; ?>" class="button"><?php echo $i + 1; ?> Semestras</a></th> <?php } ?>
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
