<!DOCTYPE html>
<?php
session_start();
include('Control/login.control.php');
?>
<html lang="en">
    <head>
        <title>ASF</title>
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

            <?php if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) { ?>
                <div class="pullRight">
                    <form action="" method="post">
                        <button  style="width:auto; margin-top: 30px;" type="logout" name="logout">Atsijungti</button>
                    </form>
                </div>
            <?php } ?>

            <div class="pullLeft">

                <button onclick="document.getElementById('noti').style.display = 'block'" style="width:auto; border-radius: 30px; margin-top: 30px;">
                    <i class="fa fa-bell"></i>
                    <span class="noti">4</span>
                </button>
                <div id="noti" class="modal">

                    <form class="modal-content animate" action="?login" method="post">

                        <span onclick="document.getElementById('noti').style.display = 'none'" class="close" title="Close Modal">&times;</span>

                        <div class="container2">
                            <label style="color:#3c88e7;" for="notification"><b><h1>* nauji pranešimai</h1></b></label>
                            <table class="semester">
                                <thead>
                                    <tr>
                                        <th>Pavadinimas</th>
                                        <th>Data</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </form>
<!--                    <script>
// Get the modal
                        var modal = document.getElementById('noti');

// When the user clicks anywhere outside of the modal, close it
                        window.onclick = function (event) {
                            if (event.target == modal) {
                                modal.style.display = "none";
                            }
                        }
                    </script>-->
                </div>                 
            </div>


            <div class="container">
                <div class="logo">
                    <a href="index.php"><img src="assets/img/logobalta.png" alt="" /></a>
                </div>




                <div class="menu">
                    <ul>
                        <li><a href="index.php">Pagrindinis</a></li>
                        <li><a href="moduliai.php">Moduliai</a></li>
                        <!--<li><a href="komentarai.php" class="active">Komentarai</a></li>-->
                    </ul>
                </div>
                <div class="mobile-menu"><i class="fa fa-bars"></i></div>
            </div>
        </header>
        <div class="intro-page" style="background-image: url('assets/img/backgr.jpg')">
            <div class="container">
                <h1>* modulio diskusija/komentarai?</h1>  
            </div>
        </div>

        <div >

            <section class="four-elements">
                <div class="container" style="width: 45%">
                    <table class="tcomments">
                        <tr>
                            <th>Jūsų komentaras</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td> <textarea id="comment" rows="2" cols="75"></textarea> </td>
                            <td style="padding-top:0px;"><button style="size: 100px;">Pateikti</button> </td>
                        </tr>

                    </table>
                    <br></br>
                    <table class="tcomments">
                        <tr>
                            <th></th>
                            <th>Kiti komentarai</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td><i class="fa fa-arrow-circle-up fa-2x" aria-hidden="true"></i></td>
                            <td> <textarea id="comments" rows="2" cols="75"></textarea> </td>
                            <td><i class="fa fa-flag" aria-hidden="true"></i></td>
                        </tr>

                    </table>
                </div>


            </section>
        </div>

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
