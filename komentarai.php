<!DOCTYPE html>
<?php
    date_default_timezone_set('Europe/Moscow');
    session_start();
    if(!isset($_SESSION['logged'])){
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
                        <li><a href="moduliai.php">Moduliai</a></li>
                        <!--<li><a href="komentarai.php" class="active">Komentarai</a></li>-->
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
        
        <?php if(isset($_GET['comment'])) { ?>
        
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
                    <?php if(!$commentExists && $_SESSION['user'] == "student"){ ?>
                    <form action="" method="POST">
                        <table class="tcomments">
                            <tr>
                                <th>Jūsų komentaras</th>
                                <th></th>
                            </tr>
                            <tr>
                                    <td> <textarea placeholder="Rašykite savo komentarą..." id="komentaras" name="komentaras" rows="2" cols="75" required></textarea> </td>
                                    <td style="padding-top:0px;"><button type="submit" name="komentuoti" style="size: 100px;">Pateikti</button> </td>
                            </tr>

                        </table>
                    </form>
                    <?php } else { ?>
                        <table class="tcomments">
                            <tr>
                                <?php if($_SESSION['user'] == "student") { ?> <th>Komentuoti galima tik vieną kartą</th> <?php } else true; ?>
                                <th></th>
                            </tr>
                    <?php } ?>
                   <br><br>
                    <?php 
                        if($data != false){ 
                    ?>
                    <table class="tcomments">
                        <tr>
                            <th></th>
                            <th>Kiti komentarai</th>
                            <th></th>
                        </tr>
                       <?php
                            $prev = null;
                            $rodyti = false;
                            $pirmas = true;
                            foreach($data as $key=>$val){ 
                                if($upvoteExists != null){
                                    if( ($myComment == $prev && $_SESSION['id'] == $val['laikintojas']) ||
                                        ($pirmas && $_SESSION['id'] == $val['laikintojas']) ||
                                         ($myComment == $val['Komentaras'] && $_SESSION['id'] == $val['laikintojas'])){
                                            $rodyti = true;
                                    }
                                    else if($val['Komentaras'] != $prev && $val['Komentaras'] != $myComment){
                                        $rodyti = true;
                                    }
                                }
                                else{
                                    if($val['Komentaras'] != $prev && $val['Komentaras'] != $myComment){
                                        $rodyti = true;
                                    }
                                }
                                if($rodyti) {
                        ?>
                        <tr>
                            <td><button onclick="upvote('<?php echo $upvoteExists; ?>', '<?php echo $_GET['id'];?>', '<?php echo $val['id'];?>')" style="display: inline-block; min-width: 0;padding: none;border: none;text-align: center;font:none;background: none; color: gray; margin: 0;
                            border-radius: none;text-transform: none; -webkit-box-shadow: none; box-shadow: none;" <?php if( ($_SESSION['user'] == "admin") || ($upvoteExists != 0 &&  $upvoteExists != $val['Up_id']) || ($commentExists && $val['Studento_id'] == $_SESSION['id'])) { ?> disabled <?php } ?> >
                            <i class="fa fa-arrow-circle-up fa-2x" aria-hidden="true" <?php if($upvoteExists != 0 &&  $upvoteExists == $val['Up_id']) { ?> style="color:red; <?php } ?>"><?php echo $val['Upvote']; ?></i></button></td>
                            <td> <textarea readonly id="comments" rows="2" cols="75" <?php if($commentExists && $val['Studento_id'] == $_SESSION['id']) { ?> style="border-color:red;" <?php } ?> ><?php echo $val['Komentaras']; ?></textarea> </td>
                            <?php if($_SESSION['user'] == "admin") { ?><td> <form action="" method="POST"><button type="submit" formaction="redaguotiKomentara.php?id=<?php echo $_GET['id']; ?>&name=<?php echo $_GET['name']; ?> &comment=<?php echo $val['id']; ?> " style="display: inline-block; min-width: 0;padding: none;border: none;text-align: center;font:none;background: none;  color:  <?php if($val['Perziureta'] == 0) { ?> red; <?php } else { ?> gray; <?php } ?> margin: 0;
                            border-radius: none;text-transform: none; -webkit-box-shadow: none; box-shadow: none;"><i class="fa fa-flag" aria-hidden="true"></i></button></form></td> <?php } ?>
                        </tr>
                        <?php
                                }
                            $prev = $val['Komentaras'];
                            $pirmas = false;
                            $rodyti = false;
                            }
                        }
                        ?>
                    </table> 
                </div>
                    <a href=<?php $newUrl1 = str_replace("&page=".$page, "&page=". 1, $newUrl); echo $newUrl1; ?>>Pirmas</a>
                    <a href="<?php if($page <= 1){ echo '#'; } else { $newUrl2 = str_replace("&page=". $page, "&page=". ($page - 1), $newUrl); echo $newUrl2; } ?>">Atgal</a>
                    <?php echo $page . " puslapis"; ?>
                    <a href="<?php if($page >= $pages){ echo '#'; } else { $newUrl3 = str_replace("&page=". $page, "&page=". ($page + 1), $newUrl); echo $newUrl3;} ?>">Kitas</a>
                    <a href=<?php $newUrl4 = str_replace("&page=". $page, "&page=". $pages, $newUrl); echo $newUrl4; ?>>Paskutinis</a>
            </section>
        </div>
        
        <script>
            function upvote(upvote, modulis, komentaras){
                $(':button').prop('disabled', true);
                $.ajax({
                
                url: 'Control/comment.control.php',
                type: 'post',
                data: 'upvote='+upvote+'&modulis='+modulis+'&komentaras='+komentaras
                
             });
             window.setTimeout(function(){location.reload()},1000)
            }
        </script>
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
        
    </body>
</html>