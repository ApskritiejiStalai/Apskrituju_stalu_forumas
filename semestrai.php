<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['logged'])) {
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
        <!--<link rel="icon" href="favicon.png" type="image/x-icon" />-->
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
            <?php if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) { ?>
                <div class="pullRight"> 
                    <form action="" method="post">
                        <button  style="width:auto; margin-top: 30px;" type="logout" name="logout">Atsijungti</button>
                    </form>
                </div>
            <?php } ?>

            <div class="container">
                <div class="logo">
                    <a href="index.php"><img src="assets/img/logobalta.png" alt="" /></a>
                </div>
                <div class="menu">
                    <ul>
                        <li><a href="index.php">Pagrindinis</a></li>
                        <li><a href="semestrai.php" class="active">Semestrai</a></li>
                    </ul>
                </div>
                <div class="mobile-menu"><i class="fa fa-bars"></i></div>
            </div>
            <div class="logas"> 
                <i class="fa fa-user" aria-hidden="true">
                    <?php
                    if (isset($_SESSION['name'])) {
                        echo "<br>";
                        echo $_SESSION['user'];
                        echo "<br>";
                        echo $_SESSION['name'];
                    }
                    ?></i>
            </div>
            <!---------------------------------------------------------------->  
        </header>



        <div class="intro-page" style="background-image: url('assets/img/backgr.jpg')">
            <div class="container">
                <h1>Semestrai</h1>
            </div>
        </div>

        <!--//-----bruksniukais padaryt kelia iki sito failo kaip db labore: pradzia > failas1 > failas2 > dabartinis----------------------------------------->
        <!--        <a href='index.php'>Pradžia</a>
                <a href='semestrai.php'>Semestrai</a>-->
        <ul class="pagePath">
            <li><a href='index.php'>Pradžia</a></li>
        </ul>
        <!--//--------------------------------->

        <section class="four-elements">
            <div class="container">
                <div>
                    <!--class="row col-lg-8"-->
                    <!--<div class="col-md-3">-->
                    <!--<div class="four-elements--image"></div>-->
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
