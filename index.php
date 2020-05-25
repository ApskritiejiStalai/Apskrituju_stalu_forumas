<!DOCTYPE html>
<?php
session_start();
include('Control/login.control.php');
include('Control/admin.control.php');

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
            <!--//---------------------------------------------------->
            <!--reik padaryt graziai username ir kazkur imest kad nesuvarytu ten virsaus-->
           <?php  if(isset($_SESSION['name'])) {
                    echo $_SESSION['user'];
                    echo $_SESSION['name'];
                    } 
           ?>
          <!---------------------------------------------------------------->  
          
            <?php if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) { ?>
                <div class="pullRight">
                    <form action="" method="post">
                        <button  style="width:auto; margin-top: 30px;" type="logout" name="logout">Atsijungti</button>
                    </form>
                </div>
            <?php } ?>

            <div class="pullLeft">
                
                <button <?php if(!isset($_SESSION['user']) || $_SESSION['user'] != "admin") { ?> style='display: none;' <?php } ?> onclick="document.getElementById('noti').style.display = 'block'" style="width:auto; border-radius: 30px; margin-top: 30px;">
                    <i class="fa fa-bell"></i>
                    <?php if($newComments != false) { ?> <span class="noti"></span> <?php } ?>
                </button>
                
                <div id="noti" class="modal">
                    <form class="modal-content animate" action="?login" method="post">
                        <span onclick="document.getElementById('noti').style.display = 'none'" class="close" title="Close Modal">&times;</span>
                        <div class="container2">
                            <label style="color:#3c88e7;" for="notification"><b><h1>Nauji pranešimai</h1></b></label>
                            <table class="semester">
                                <thead>
                                    <tr>
                                        <th>Modulio kodas</th>
                                        <th>Data</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($newComments != false) 
                                            foreach($newComments as $key=>$val) { ?>
                                    <tr>
                                        <td> <a href="redaguotiKomentara.php?semester=<?php echo $val['Semestras']; ?>&id=<?php echo $val['Modulio_id']; ?> &name= <?php echo $val['Pavadinimas']; ?>  &comment= <?php echo $val['id']; ?>" > <?php echo $val['Modulio_id']; ?></td>
                                        <td> <a href="redaguotiKomentara.php?semester=<?php echo $val['Semestras']; ?>&id=<?php echo $val['Modulio_id']; ?> &name= <?php echo $val['Pavadinimas']; ?>  &comment= <?php echo $val['id']; ?>" > <?php echo $val['Data']; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </form>
                </div>                 
            </div>

            <?php if (isset($_SESSION['logged']) && $_SESSION['logged'] != true || !isset($_SESSION['logged'])) { ?>
                <div class="pullRight">
                    <button onclick="document.getElementById('id01').style.display = 'block'" style="width:auto; margin-top: 30px;">Prisijungti</button>
                    <div id="id01" class="modal">
                        <form class="modal-content animate" action="?login" method="post">
                            <span onclick="document.getElementById('id01').style.display = 'none'" class="close" title="Close Modal">&times;</span>
                            <div class="container2">
                                <label for="uname"><b>Prisijungimo vardas</b></label>
                                <input type="text" name="uname" id="uname" required>

                                <label for="psw"><b>Slaptažodis</b></label>
                                <input type="password" name="psw"  id="psw" required>

                                <button  type="submit" name="submit">Prisijungti</button>

                            </div>
                        </form>                       
                    </div>
                </div>
            <?php } ?>
            <?php if (isset($_GET['login']) && $_GET['login'] == 'false') { ?>

                <script src = "https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
                <script type="text/javascript">
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Neteisingai įvestas prisijungimo vardas arba slaptažodis ',
                                    showConfirmButton: false,
                                    timer: 2000
                                })
                </script>
            <?php } ?>  
            <div class="container">
                <div class="logo">
                    <a href="index.php"><img src="assets/img/logobalta.png" alt="" /></a>
                </div>




                <div class="menu">
                    <ul>
                        <li><a href="index.php" class="active">Pagrindinis</a></li>
                        <li><a href="semestrai.php">Semestrai</a></li>
                        <!--<li><a href="komentarai.php">Komentarai</a></li>-->
                    </ul>
                </div>
                <div class="mobile-menu"><i class="fa fa-bars"></i></div>
            </div>
        </header>

        <div class="home-slider">
            <!--virsus-->
            <div class="home-slider--wrapper">
                <!--trikampiukas-->
                <div>
                    <div class="home-slider--wrapper__inner" style="background-image: url('assets/img/backgr.jpg')">
                        <div class="container">
                            <h1>Apskritųjų stalų forumas</h1>
                            <span class="dot-dash">.</span>
                            <p>Forumas skirtas KTU bendruomenės nariams išreikšti nuomonę apie modulius ir dėstytojus</p>
                            <div class="slider-buttons">
                                <a href="semestrai.php" class="button">Pradėti diskusiją</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="home-slider--anchor">
                <span><i class="fa fa-caret-down" aria-hidden="true"></i></span>
            </div>
        </div>


        <div class="wrapper">

            <section class="our-history">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            <img src="assets/img/roundTableIcon.png" alt="" />
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12">
                            <h2>Apskritieji stalai</h2>
                            <p>
                                Apskritieji stalai – kiekvieno semestro metu vykstančios diskusijos apie to semestro modulius ir dėstytojus.
                                Jų tikslas – gauti grįžtamąjį ryšį apie einamąjį semestrą, išsiaiškinti studentams kylančias problemas bei ieškoti
                                joms geriausio sprendimo būdo.
                            </p>

                            <a href="darbai.php" class="button">Atlikti darbai</a>
                        </div>
                    </div>
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
        <script>
            // Get the modal
            var modal = document.getElementById('id01');

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
    </body>
</html>
