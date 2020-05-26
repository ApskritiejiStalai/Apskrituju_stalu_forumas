<!DOCTYPE html>
<?php
date_default_timezone_set('Europe/Moscow');
session_start();
if (!isset($_SESSION['logged'])) {
    header("Location: index.php");
    die();
}
include('Control/login.control.php');
include('Control/comment.control.php');
?>
<html lang="en">
    <head>
        <title>ASF komentarai</title>
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
          
            <?php if (isset($_SESSION['exists']) && $_SESSION['exists'] == true) { unset($_SESSION['exists']);?>
                <script src = "https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
                <script type="text/javascript">
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Toks komentaras jau egzistuoja',
                        showConfirmButton: false,
                        timer: 2000
                    })
                </script>
            <?php } ?>

            <div class="containerH">
                <div class="logo">
                    <a href="index.php"><img src="assets/img/logobalta.png" alt="" /></a>
                </div>

                <div class="menu">
                    <ul>
                        <li><a style="margin-top: 17px;" href="index.php">Pagrindinis</a></li>
                        <li><a style="margin-top: 17px;" href="semestrai.php">Semestrai</a></li>
                        <li>&nbsp;</li>
                        <ui style="float: left; margin-top: 15px;" class="logas pull-right">
                            <a  class="fa fa-user" aria-hidden="true">
                                <?php
                                if (isset($_SESSION['name'])) {
                                    echo $_SESSION['user'];
                                    echo "<br>";
                                    echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                                    echo $_SESSION['name'];
                                }
                                ?>
                            </a>
                        </ui>
                        <li><?php if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) { ?>
                                <div class="pullRight">
                                    <form action="" method="post">
                                        <button  style="width:auto; " type="logout" name="logout">Atsijungti</button>
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
         <div class="pagePath">
            <li><a href='index.php'>Pradžia</a></li>
            <li><a href='semestrai.php'>Semestrai</a></li>
            <li><a href='semestroModuliai.php?semester=<?php echo $_GET['semester']; ?>'>Moduliai</a></li>
        </div>
        
        <?php if (isset($_GET['comment'])) { ?>
            <div>
                <section class="four-elements">
                    <div class="container" style="width: 45%">
                        <form action="" method="POST">
                            <table class="tcomments">
                                <tr>
                                    <th>Komentaro redagavimas</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td> <textarea placeholder="Rašykite savo komentarą..." id="komentaras" name="komentaras" rows="2" cols="75" required></textarea> </td>
                                    <td style="padding-top:0px;"><button type="submit" name="komentuoti" style="size: 100px;">Pateikti</button> </td>
                                </tr>

                            </table>
                        </form>
                    </div>
                </section>
            </div>

        <?php } else { ?>

            <div>
                <section class="four-elements">
                    <div class="container" style="width: 45%">
                        <?php if (!$commentExists && $_SESSION['user'] == "student") { ?>
                            <form action="" method="POST">
                                <table class="tcomments">
                                    <tr>
                                        <th>Jūsų komentaras</th>
                                        <th></th>
                                    </tr>
                                    <tr>                                  
                                        <td> <textarea onkeyup="textCounter(this, 'counter', 150);" placeholder="Rašykite savo komentarą..." id="komentaras" name="komentaras" rows="2" cols="75" required></textarea> </td>
                                        <td style="padding-top:0px;"><button type="submit" name="komentuoti" style="size: 100px;">Pateikti</button> </td>
                                    </tr>
                                </table>
                                Liko simbolių: <input disabled  maxlength="3" size="3" value="150" id="counter">
                            </form>
                        <?php } else { ?>
                            <table class="tcomments">
                                <tr>
                                    <?php if ($_SESSION['user'] == "student") { ?> <th style="color: red" >Komentuoti galima tik vieną kartą</th> <?php } else if ($_SESSION['user'] == "admin" && $data == false) { ?>  <th>Komentarų nėra</th> <?php } ?>
                                    <th></th>
                                </tr>
                            <?php } ?>

                            <?php
                            if ($data != false) {
                                $edit = false; //galimybe studentui redaguoti per pirmasias 20min
                                ?>
                                <table class="tcomments">
                                    <tr>
                                        <th></th>
                                        <?php if ($_SESSION['user'] == "student") { ?> <th>Kiti komentarai</th><?php } ?>
                                        <th></th>
                                    </tr>
                                    <?php
                                    for ($i = $offset; $i < sizeof($data); $i++) {
                                        if($i == 0 && $commentExists){
                                            
                                            $dateFromComment = $data[$i]['Metai']."-".$data[$i]['Menesis']."-".$data[$i]['Diena']." ".$data[$i]['Laikas'];
                                            if(strtotime($dateFromComment) + 1200 >= strtotime(date('Y-n-j H:i:s'))){
                                                $edit = true;
                                            }
                                        }
                                        if ($i >= $end) {
                                            break;
                                        }
                                        ?>
                                        <tr>
                                            <td><button onclick="upvote('<?php echo $upvoteExists; ?>', '<?php echo $_GET['id']; ?>', '<?php echo $data[$i]['id']; ?>')" style="display: inline-block; min-width: 0;padding: none;border: none;text-align: center;font:none;background: none; color: gray; margin: 0;
                                                        border-radius: none;text-transform: none; -webkit-box-shadow: none; box-shadow: none;" <?php if (($_SESSION['user'] == "admin") || ($upvoteExists != 0 && $upvoteExists != $data[$i]['Up_id']) || ($commentExists && $data[$i]['Studento_id'] == $_SESSION['id'])) { ?> disabled <?php } ?> >
                                                    <i class="fa fa-arrow-circle-up fa-2x" aria-hidden="true" <?php if ($upvoteExists != 0 && $upvoteExists == $data[$i]['Up_id']) { ?> style="color:red; <?php } ?>">&nbsp;<?php echo $data[$i]['Upvote']; ?></i></button></td>
                                            <td> <textarea readonly id="comments" rows="2" cols="75" <?php if ($commentExists && $data[$i]['Studento_id'] == $_SESSION['id']) { ?> style="border-color:red;" <?php } ?> ><?php echo $data[$i]['Komentaras']; ?></textarea> </td>
                                            <?php if ($_SESSION['user'] == "admin" || ($edit && $data[$i]['Perziureta'] != 1)) { $edit = false; ?><td> <form action="" method="POST"><button type="submit" name="redagavimas" formaction="redaguotiKomentara.php?semester=<?php echo $_GET['semester']; ?>&id=<?php echo $_GET['id']; ?>&name=<?php echo $_GET['name']; ?> &comment=<?php echo $data[$i]['id']; ?> " style="display: inline-block; min-width: 0;padding: none;border: none;text-align: center;font:none;background: none;  color:  <?php if ($data[$i]['Perziureta'] == 0) { ?> red; <?php } else { ?> gray; <?php } ?> margin: 0;
                                                                                           border-radius: none;text-transform: none; -webkit-box-shadow: none; box-shadow: none;"><i class="fa fa-flag" aria-hidden="true"></i></button></form></td> <?php } ?>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </table> 
                    </div>
                    <div class="pages">
                        <?php if ($page > 1) { ?> <a href=<?php
                            $newUrl1 = str_replace("&page=" . $page, "&page=" . 1, $newUrl);
                            echo $newUrl1;
                            ?>><i class="fa fa-fast-backward" aria-hidden="true"></i></a><?php } ?>
                        &nbsp;&nbsp;
                        <?php if ($page > 1) { ?> <a href="<?php
                            $newUrl2 = str_replace("&page=" . $page, "&page=" . ($page - 1), $newUrl);
                            echo $newUrl2;
                            ?>"><i class="fa fa-step-backward" aria-hidden="true"></i></a><?php } ?>
                        &nbsp;&nbsp;
                        <?php if ($pages > 1) echo $page . " puslapis"; ?>
                        &nbsp;&nbsp;
                        <?php if ($page < $pages) { ?> <a href="<?php
                            $newUrl3 = str_replace("&page=" . $page, "&page=" . ($page + 1), $newUrl);
                            echo $newUrl3;
                            ?>"><i class="fa fa-step-forward" aria-hidden="true"></i></a> 
                           <?php } ?>
                        &nbsp;&nbsp;
                        <?php if ($page < $pages) { ?> <a href=<?php
                            $newUrl4 = str_replace("&page=" . $page, "&page=" . $pages, $newUrl);
                            echo $newUrl4;
                            ?>><i class="fa fa-fast-forward" aria-hidden="true"></i></a> <?php } ?>
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
        <script>
                function upvote(upvote, modulis, komentaras) { //upvote mygtuko scriptas
                    $(':button').prop('disabled', true);
                    $.ajax({

                        url: 'Control/comment.control.php',
                        type: 'post',
                        data: 'upvote=' + upvote + '&modulis=' + modulis + '&komentaras=' + komentaras

                    });
                    window.setTimeout(function () {
                        location.reload()
                    }, 1000)
                }
            </script>
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