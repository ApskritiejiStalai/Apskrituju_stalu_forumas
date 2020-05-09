﻿<!DOCTYPE html>
<?php 
    session_start();
    if(!isset($_SESSION['logged'])){
        header("Location: index.php");
        die();
    }
    include('Control/login.control.php');
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
    <link rel="stylesheet" type="text/css" href="css/moduliuStyle.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

    <header>
    <?php if(isset($_SESSION['logged']) && $_SESSION['logged'] == true) { ?>
            <div class="pullRight"> 
                <form action="" method="post">
                    <button  style="width:auto;" type="logout" name="logout">Atsijungti</button>
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
                    <li><a href="moduliai.php" class="active">Moduliai</a></li>
                </ul>
            </div>
            <div class="mobile-menu"><i class="fa fa-bars"></i></div>
        </div>
        
       

            
        
    </header>

    <div class="intro-page" style="background-image: url('assets/img/backgr.jpg')">
        <div class="container">
            <h1>Moduliai</h1>
            <p>Informatikos fakulteto moduliai</p>
        </div>
    </div>

    <section class="four-elements">
        <div class="container">
            <div>
                <!--class="row col-lg-8"-->
                <!--<div class="col-md-3">-->
                <!--<div class="four-elements--image"></div>-->
                <table class="my_table" align="center">


                    <tr>
                        <th colspan="2"><a href="semestroModuliai.php?semester=1" class="button">1 Semestras</a></th>
                        <th rowspan="4" width="100px"></th>
                        <th colspan="2"><a href="semestroModuliai.php?semester=2" class="button">2 Semestras</a></th>
                    </tr>
                    <tr>
                        <th colspan="2"><a href="semestroModuliai.php?semester=3" class="button">3 Semestras</a></th>
                        <th width="100px"></th>
                        <th colspan="2"><a href="semestroModuliai.php?semester=4" class="button">4 Semestras</a></th>
                    </tr>

                    <tr>
                        <th colspan="2"><a href="semestroModuliai.php?semester=5" class="button">5 Semestras</a></th>
                        <th width="100px"></th>
                        <th colspan="2"><a href="semestroModuliai.php?semester=6" class="button">6 Semestras</a></th>
                    </tr>

                    <tr>
                        <th colspan="2"><a href="semestroModuliai.php?semester=7" class="button">7 Semestras</a></th>
                    </tr>
                </table>

                <!--<table class="forumTable">
                    <tr>
                        <td style="text-align:center;">Kodas</td>
                        <td>Dalyko pavadinimas</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <a href="#"><li>P130B001</li></a>
                            <a href="#"><li>P175B118</li></a>
                            <a href="#"><li>P175B117</li></a>
                            <a href="#"><li>T120B196</li></a>
                            <a href="#"><li>P175B505</li></a>
                            <a href="#"><li>P130B002</li></a>
                            <a href="#"><li>P175B100</li></a>
                            <a href="#"><li>P175B123</li></a>
                            <a href="#"><li>P175B502</li></a>
                            <a href="#"><li>P190B101</li></a>
                            <a href="#"><li>S183B001</li></a>
                            <a href="#"><li>H120B111</li></a>
                            <a href="#"><li>H570B104</li></a>
                            <a href="#"><li>P160B003</li></a>
                            <a href="#"><li>P170B008</li></a>
                            <a href="#"><li>P175B014</li></a>
                            <a href="#"><li>P175B126</li></a>
                            <a href="#"><li>P175B125</li></a>
                            <a href="#"><li>P175B163</li></a>
                            <a href="#"><li>PR00B121</li></a>
                            <a href="#"><li>P175B121</li></a>
                            <a href="#"><li>P170B400</li></a>
                            <a href="#"><li>P175B015</li></a>
                            <a href="#"><li>P175B314</li></a>
                            <a href="#"><li>P175B304</li></a>
                            <a href="#"><li>P175B602</li></a>
                            <a href="#"><li>T120B143</li></a>
                            <a href="#"><li>T120B129</li></a>
                            <a href="#"><li>P170B114</li></a>
                            <a href="#"><li>S122B100</li></a>
                            <a href="#"><li>S181B002</li></a>
                            <a href="#"><li>S192B002</li></a>
                            <a href="#"><li>W240B100</li></a>
                            <a href="#"><li>W240B111</li></a>
                            <a href="#"><li>P170B115</li></a>
                            <a href="#"><li>T120B132</li></a>
                            <a href="#"><li>T120B015</li></a>
                            <a href="#"><li>T120B126</li></a>
                            <a href="#"><li>T120B195</li></a>
                            <a href="#"><li>T120B120</li></a>
                            <a href="#"><li>P175B120</li></a>
                            <a href="#"><li>T120B173</li></a>
                            <a href="#"><li>P175B129</li></a>
                            <a href="#"><li>T120B146</li></a>
                            <a href="#"><li>T120B188</li></a>
                            <a href="#"><li>T120B161</li></a>
                            <a href="#"><li>S272L756</li></a>
                            <a href="#"><li>S000L102</li></a>
                            <a href="#"><li>S272L100</li></a>
                            <a href="#"><li>S272B101</li></a>
                            <a href="#"><li>S181B119</li></a>
                            <a href="#"><li>P170B120</li></a>
                            <a href="#"><li>P120B105</li></a>
                            <a href="#"><li>S190B176</li></a>
                            <a href="#"><li>T120B194</li></a>
                            <a href="#"><li>S262L001</li></a>
                            <a href="#"><li>P260B001</li></a>
                            <a href="#"><li>T120B197</li></a>
                            <a href="#"><li>S181B526</li></a>
                            <a href="#"><li>S190B129</li></a>
                            <a href="#"><li>T190B132</li></a>
                            <a href="#"><li>S265B105</li></a>
                            <a href="#"><li>T130B033</li></a>
                            <a href="#"><li>T001B100</li></a>
                            <a href="#"><li>P160B112</li></a>
                            <a href="#"><li>T150B016</li></a>
                            <a href="#"><li>T120B111</li></a>
                            <a href="#"><li>P175B167</li></a>
                            <a href="#"><li>S192B003</li></a>
                            <a href="#"><li>W240B101</li></a>
                            <a href="#"><li>P160B103</li></a>
                            <a href="#"><li>T120B145</li></a>
                            <a href="#"><li>P175B124</li></a>
                            <a href="#"><li>T125B114</li></a>
                            <a href="#"><li>P170B328</li></a>
                            <a href="#"><li>T120B029</li></a>
                            <a href="#"><li>T120B162</li></a>
                            <a href="#"><li>T120B169</li></a>
                            <a href="#"><li>P175B162</li></a>
                            <a href="#"><li>T120B190</li></a>
                            <a href="#"><li>S191B016</li></a>
                            <a href="#"><li>S181B001</li></a>
                            <a href="#"><li>T120B181</li></a>
                            <a href="#"><li>S192B102</li></a>
                            <a href="#"><li>T120B192</li></a>
                            <a href="#"><li>W240B010</li></a>
                            <a href="#"><li>T111B010</li></a>
                            <a href="#"><li>H592B102</li></a>
                            <a href="#"><li>P260B103</li></a>
                            <a href="#"><li>T155B145</li></a>
                            <a href="#"><li>T210B036</li></a>
                            <a href="#"><li>W200B103</li></a>
                            <a href="#"><li>S170B134</li></a>
                            <a href="#"><li>S191B127</li></a>
                            <a href="#"><li>P170B127</li></a>
                            <a href="#"><li>S170B136</li></a>
                            <a href="#"><li>S191B128</li></a>
                            <a href="#"><li>P160B124</li></a>
                            <a href="#"><li>T200B142</li></a>
                            <a href="#"><li>P200B403</li></a>
                            <a href="#"><li>P190B117</li></a>
                            <a href="#"><li>S186B005</li></a>
                            <a href="#"><li>T120B516</li></a>
                            <a href="#"><li>T120B178</li></a>
                            <a href="#"><li>P160B116</li></a>
                            <a href="#"><li>P176B101</li></a>
                            <a href="#"><li>H570B013</li></a>
                            <a href="#"><li>T120B019</li></a>
                            <a href="#"><li>T120B165</li></a>
                            <a href="#"><li>S192B114</li></a>
                            <a href="#"><li>S190B377</li></a>
                            <a href="#"><li>S191B017</li></a>
                            <a href="#"><li>T140B128</li></a>
                            <a href="#"><li>H365B004</li></a>
                            <a href="#"><li>P170B907</li></a>
                            <a href="#"><li>S000B177</li></a>
                            <a href="#"><li>S189B126</li></a>
                            <a href="#"><li>S210B003</li></a>
                            <a href="#"><li>S180B103</li></a>
                            <a href="#"><li>T120B180</li></a>
                            <a href="#"><li>S272B723</li></a>
                            <a href="#"><li>S189B186</li></a>
                            <a href="#"><li>S181B110</li></a>
                            <a href="#"><li>T120B168</li></a>
                            <a href="#"><li>S190B137</li></a>
                            <a href="#"><li>S181B103</li></a>
                            <a href="#"><li>P170B118</li></a>
                            <a href="#"><li>S181B118</li></a>
                            <a href="#"><li>T170B204</li></a>
                            <a href="#"><li>S265B106</li></a>
                            <a href="#"><li>P160B113</li></a>
                            <a href="#"><li>T170B142</li></a>
                            <a href="#"><li>P170B111</li></a>
                            <a href="#"><li>T490B106</li></a>
                            <a href="#"><li>T120B106</li></a>
                            <a href="#"><li>P190B115</li></a>
                            <a href="#"><li>T130B154</li></a>
                            <a href="#"><li>S270L754</li></a>
                            <a href="#"><li>P170B103</li></a>
                            <a href="#"><li>W210B001</li></a>
                            <a href="#"><li>P170B112</li></a>
                            <a href="#"><li>P160B122</li></a>
                            <a href="#"><li>P170B126</li></a>
                            <a href="#"><li>T120B147</li></a>
                            <a href="#"><li>P170B113</li></a>
                            <a href="#"><li>T200B014</li></a>
                            <a href="#"><li>P220B305</li></a>
                            <a href="#"><li>P190B302</li></a>
                            <a href="#"><li>S186B003</li></a>
                            <a href="#"><li>H353B008</li></a>
                            <a href="#"><li>H570B014</li></a>
                            <a href="#"><li>S181B105</li></a>
                            <a href="#"><li>P175B122</li></a>
                            <a href="#"><li>S191B118</li></a>
                            <a href="#"><li>S191B122</li></a>
                            <a href="#"><li>S189B114</li></a>
                            <a href="#"><li>T120B149</li></a>
                            <a href="#"><li>T120B148</li></a>
                            <a href="#"><li>S189B116</li></a>
                            <a href="#"><li>S191B129</li></a>
                            <a href="#"><li>T200B108</li></a>
                            <a href="#"><li>P230B202</li></a>
                            <a href="#"><li>P190B005</li></a>
                            <a href="#"><li>S186B126</li></a>
                            <a href="#"><li>H365B103</li></a>
                            <a href="#"><li>S189B101</li></a>
                            <a href="#"><li>T120B167</li></a>
                            <a href="#"><li>S146B253</li></a>
                        </td>
                        <td>
                            <a href="#"><li>Matematika 1 </li></a>
                            <a href="#"><li>Objektinis programavimas 1 </li></a>
                            <a href="#"><li>Objektinio programavimo pagrindai 1  </li></a>
                            <a href="#"><li>Informatikos studijų įvadas  </li></a>
                            <a href="#"><li>Kompiuterinė grafika </li></a>
                            <a href="#"><li>Matematika 2 </li></a>
                            <a href="#"><li>Skaitmeninės logikos pradmenys </li></a>
                            <a href="#"><li>Objektinis programavimas 2 </li></a>
                            <a href="#"><li>Objektinio programavimo pagrindai 2  </li></a>
                            <a href="#"><li>Fizika 1 </li></a>
                            <a href="#"><li>Darnus vystymasis  </li></a>
                            <a href="#"><li>Medijų filosofija  </li></a>
                            <a href="#"><li>Akademinė ir dalykinės srities komunikacija anglų kalba (C1 lygiu)  </li></a>
                            <a href="#"><li>Tikimybių teorija ir statistika </li></a>
                            <a href="#"><li>Diskrečiosios struktūros </li></a>
                            <a href="#"><li>Duomenų struktūros </li></a>
                            <a href="#"><li>Duomenų struktūrų pagrindai  </li></a>
                            <a href="#"><li>Kompiuterių architektūra </li></a>
                            <a href="#"><li>Sistemų imitacinis modeliavimas  </li></a>
                            <a href="#"><li>Semestro projektas </li></a>
                            <a href="#"><li>Informacinių sistemų projektų valdymas ir diegimas  </li></a>
                            <a href="#"><li>Algoritmų sudarymas ir analizė </li></a>
                            <a href="#"><li>Programų sistemų inžinerija </li></a>
                            <a href="#"><li>Programavimo inžinerija  </li></a>
                            <a href="#"><li>Operacinės sistemos </li></a>
                            <a href="#"><li>Duomenų bazės </li></a>
                            <a href="#"><li>Įmonių kompiuterinių sistemų kūrimo platformos  </li></a>
                            <a href="#"><li>Informacinių technologijų sauga  </li></a>
                            <a href="#"><li>Informacinių sistemų pagrindai </li></a>
                            <a href="#"><li>Žiniasklaidos etika ir teisė  </li></a>
                            <a href="#"><li>Įmonės veiklos analizė </li></a>
                            <a href="#"><li>Valdymo apskaita </li></a>
                            <a href="#"><li>Eskizavimo technika   </li></a>
                            <a href="#"><li>Kūrybinės dizaino dirbtuvės  </li></a>
                            <a href="#"><li>Skaitiniai metodai ir algoritmai </li></a>
                            <a href="#"><li>Skaitmeniniai signalai ir grandynai  </li></a>
                            <a href="#"><li>Kompiuterinių sistemų inžinerija  </li></a>
                            <a href="#"><li>Sistemų projektavimas Framework aplinkose  </li></a>
                            <a href="#"><li>Informacinių technologijų produkto vystymo projektas  </li></a>
                            <a href="#"><li>Kibernetinis saugumas  </li></a>
                            <a href="#"><li>Paslaugų programavimas debesų kompiuterijoje  </li></a>
                            <a href="#"><li>Daugiaagenčių sistemų pagrindai  </li></a>
                            <a href="#"><li>Išskirstytosios duomenų bazės  </li></a>
                            <a href="#"><li>Įterptinių sistemų analizė ir projektavimas  </li></a>
                            <a href="#"><li>Debesų technologijų saugyklos  </li></a>
                            <a href="#"><li>Turinio apdorojimo sistemos  </li></a>
                            <a href="#"><li>Didaktika  </li></a>
                            <a href="#"><li>Pedagogo kompetencijos portfelio rengimas </li></a>
                            <a href="#"><li>Ugdymo programų planavimas ir realizavimas </li></a>
                            <a href="#"><li>Ugdomasis vadovavimas  </li></a>
                            <a href="#"><li>Bankininkystė ir draudimas  </li></a>
                            <a href="#"><li>Matematiniai skaitmeninių vaizdų apdorojimo metodai  </li></a>
                            <a href="#"><li>Algebrinės struktūros  </li></a>
                            <a href="#"><li>Darbuotojų veiklos valdymas  </li></a>
                            <a href="#"><li>Scenarijų kalbos  </li></a>
                            <a href="#"><li>Pedagoginė ir raidos psichologija  </li></a>
                            <a href="#"><li>Medžiagų fizika  </li></a>
                            <a href="#"><li>Informacinių sistemų programų derinimas  </li></a>
                            <a href="#"><li>Finansų pagrindai  </li></a>
                            <a href="#"><li>Žmonių išteklių pritraukimas ir išlaikymas  </li></a>
                            <a href="#"><li>Išmaniosios statinių elektros sistemos  </li></a>
                            <a href="#"><li>Radijo, televizijos ir interneto žurnalistika  </li></a>
                            <a href="#"><li>Kompiuterinis projektavimas 1  </li></a>
                            <a href="#"><li>Modernios elektronikos technologijos  </li></a>
                            <a href="#"><li>Verslo sistemų rizikos analizės metodologija  </li></a>
                            <a href="#"><li>Medžiagų mokslo įvadas  </li></a>
                            <a href="#"><li>Realaus laiko sistemos  </li></a>
                            <a href="#"><li>Vizualaus projektavimo principai  </li></a>
                            <a href="#"><li>Apskaitos pagrindai  </li></a>
                            <a href="#"><li>Dizaino pagrindai  </li></a>
                            <a href="#"><li>Duomenų analizė  </li></a>
                            <a href="#"><li>Kompiuterių tinklai ir internetinės technologijos </li></a>
                            <a href="#"><li>Programavimo kalbų teorija </li></a>
                            <a href="#"><li>Robotų programavimo technologijos </li></a>
                            <a href="#"><li>Lygiagretusis programavimas </li></a>
                            <a href="#"><li>Programų sistemų analizės ir projektavimo įrankiai </li></a>
                            <a href="#"><li>Programų sistemų testavimas </li></a>
                            <a href="#"><li>Mobilių programėlių kūrimo pagrindai  </li></a>
                            <a href="#"><li>Grafikos programavimas  </li></a>
                            <a href="#"><li>Trimatės grafikos modeliavimo pagrindai  </li></a>
                            <a href="#"><li>Marketingas virtualioje aplinkoje  </li></a>
                            <a href="#"><li>Mokesčiai ir apmokestinimas </li></a>
                            <a href="#"><li>Kompiuterių tinklų ir interneto sauga  </li></a>
                            <a href="#"><li>Verslo įmonių apskaita  </li></a>
                            <a href="#"><li>Mobiliosios internetinės sistemos  </li></a>
                            <a href="#"><li>Produkto dizainas  </li></a>
                            <a href="#"><li>Vaizdo sintaksė  </li></a>
                            <a href="#"><li>Žiniasklaidos technologijų specialybės kalba </li></a>
                            <a href="#"><li>Paviršiaus ir paviršinių reiškinių fizika  </li></a>
                            <a href="#"><li>Magnetinės medžiagos  </li></a>
                            <a href="#"><li>Kompiuterinė konstrukcijų analizė  </li></a>
                            <a href="#"><li>Vartotojų patyrimų dizainas  </li></a>
                            <a href="#"><li>Socialinių duomenų valdymas ir sauga  </li></a>
                            <a href="#"><li>Kūrybiška reklama  </li></a>
                            <a href="#"><li>Duomenų sauga  </li></a>
                            <a href="#"><li>Europos Sąjungos užsienio ir saugumo politika  </li></a>
                            <a href="#"><li>Socialinė žiniasklaida marketinge  </li></a>
                            <a href="#"><li>Mašininio mokymosi metodai  </li></a>
                            <a href="#"><li>Dujų tiekimo sistemos  </li></a>
                            <a href="#"><li>Elektrodinamika </li></a>
                            <a href="#"><li>Matematinė fizika ir skaitiniai metodai  </li></a>
                            <a href="#"><li>Mokestinės sistemos  </li></a>
                            <a href="#"><li>Objektinis programų projektavimas </li></a>
                            <a href="#"><li>Informacinių sistemų kūrimas karkasais  </li></a>
                            <a href="#"><li>Optimizavimo metodai </li></a>
                            <a href="#"><li>Intelektikos pagrindai </li></a>
                            <a href="#"><li>Technikos teksto analizė ir vertimas 1 (anglų kalba)  </li></a>
                            <a href="#"><li>Žmogaus-kompiuterio sąsajos projektavimas </li></a>
                            <a href="#"><li>Saityno taikomųjų programų projektavimas </li></a>
                            <a href="#"><li>Įmonės apskaitos ir finansų valdymo pagrindai </li></a>
                            <a href="#"><li>Įmonių valdymo pagrindai </li></a>
                            <a href="#"><li>Marketingas </li></a>
                            <a href="#"><li>Elektros energetikos ekonomika ir rinka  </li></a>
                            <a href="#"><li>Vertimo technologijos  </li></a>
                            <a href="#"><li>Matematikos programinė įranga  </li></a>
                            <a href="#"><li>Technologijų antreprenerystė </li></a>
                            <a href="#"><li>Valstybės tarnyba  </li></a>
                            <a href="#"><li>Darni socialinė raida </li></a>
                            <a href="#"><li>Inžinerinė ekonomika </li></a>
                            <a href="#"><li>Tinklo paslaugų kūrimas ir diegimas  </li></a>
                            <a href="#"><li>Andragogikos pagrindai  </li></a>
                            <a href="#"><li>Pardavimų valdymas  </li></a>
                            <a href="#"><li>Biudžetų sudarymas  </li></a>
                            <a href="#"><li>Interaktyvios interneto technologijos  </li></a>
                            <a href="#"><li>Inovacijų vadyba  </li></a>
                            <a href="#"><li>Finansų rinkos ir institucijos  </li></a>
                            <a href="#"><li>Fizikine elgsena grįstos animacijos  </li></a>
                            <a href="#"><li>Asmeninių finansų valdymas  </li></a>
                            <a href="#"><li>Elektronikos pagrindai </li></a>
                            <a href="#"><li>Televizijos laidų gamyba   </li></a>
                            <a href="#"><li>Investicijų matematika  </li></a>
                            <a href="#"><li>Energetinė elektronika  </li></a>
                            <a href="#"><li>Kriptologija  </li></a>
                            <a href="#"><li>Biomedžiagos ir jų technologijos  </li></a>
                            <a href="#"><li>Skaitmeninės garso ir vaizdo sistemos  </li></a>
                            <a href="#"><li>Termodinamika ir statistinė fizika medžiagų mokslui  </li></a>
                            <a href="#"><li>Kompiuterinis projektavimas 2  </li></a>
                            <a href="#"><li>Bendroji ir specialioji pedagogika  </li></a>
                            <a href="#"><li>Duomenų saugyklos ir verslo duomenų analizė  </li></a>
                            <a href="#"><li>Grafinis dizainas  </li></a>
                            <a href="#"><li>Verslo valdymo sistemos  </li></a>
                            <a href="#"><li>Draudimo matematika  </li></a>
                            <a href="#"><li>Informacinių sistemų grafinė naudotojo sąsaja  </li></a>
                            <a href="#"><li>Duomenų bazių programavimas ir administravimas  </li></a>
                            <a href="#"><li>Veiklos procesų skaitmeninimas  </li></a>
                            <a href="#"><li>Šaldymo pagrindai  </li></a>
                            <a href="#"><li>Branduolio ir dalelių fizika </li></a>
                            <a href="#"><li>Kvantinė mechanika </li></a>
                            <a href="#"><li>Tarptautinės prekybos operacijos  </li></a>
                            <a href="#"><li>Kalbos ekologija  </li></a>
                            <a href="#"><li>Technikos teksto analizė ir vertimas 2 (anglų kalba)  </li></a>
                            <a href="#"><li>Tarptautiniai finansiniai atsiskaitymai  </li></a>
                            <a href="#"><li>Įmonių veiklos procesų valdymas ir modernizavimas  </li></a>
                            <a href="#"><li>Prekės ženklo valdymas </li></a>
                            <a href="#"><li>Ryšiai su visuomene  </li></a>
                            <a href="#"><li>Vietos savivaldos pagrindai  </li></a>
                            <a href="#"><li>Reikalavimų informacinėms sistemoms analizė ir specifikavimas  </li></a>
                            <a href="#"><li>Informacinių sistemų projektavimas ir CASE technologijos  </li></a>
                            <a href="#"><li>Strateginis planavimas viešojo sektoriaus organizacijose  </li></a>
                            <a href="#"><li>Marketingo pagrindai  </li></a>
                            <a href="#"><li>Termodinamika ir šilumos generavimas  </li></a>
                            <a href="#"><li>Fizika 2  </li></a>
                            <a href="#"><li>Klasikinė mechanika  </li></a>
                            <a href="#"><li>Tarptautinė ekonomika  </li></a>
                            <a href="#"><li>Įvadas į vertimo studijas  </li></a>
                            <a href="#"><li>Įvadas į viešąjį valdymą  </li></a>
                            <a href="#"><li>Žaidimų efektų programavimo pagrindai  </li></a>
                            <a href="#"><li>Darbo teisės pagrindai </li></a>
                        </td>
                    </tr>
                </table>-->
                <!--<table class="forumTable">
                    <tr><h2>1 Semestras</h2></tr>
                    <tr>
                        <td>Kodas</td>
                        <td>Dalyko pavadinimas</td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#"><li>T120B196</li></a>
                            <a href="#"><li>P175B505</li></a>
                            <a href="#"><li>P130B001</li></a>
                            <a href="#"> <li>P175B117</li></a>

                        </td>
                        <td class="moduleAlignment">

                            <a href="#"><li>Informatikos studijų įvadas</li></a>
                            <a href="#"><li>Kompiuterinė grafika</li></a>
                            <a href="#"><li>Matematika 1</li></a>
                            <a href="#"> <li>Objektinis programavimas 1</li></a>

                        </td>
                    </tr>

                </table>
                <table class="forumTable">
                    <tr><h2>2 Semestras</h2></tr>
                    <tr>
                        <td>Kodas</td>
                        <td>Dalyko pavadinimas</td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#"><li>P190B101</li></a>
                            <a href="#"><li>P130B002</li></a>
                            <a href="#"><li>P175B502</li></a>
                            <a href="#"> <li>P175B100</li></a>

                        </td>
                        <td class="moduleAlignment">

                            <a href="#"><li>Fizika 1</li></a>
                            <a href="#"><li>Matematika 2</li></a>
                            <a href="#"><li>Objektinio programavimo pagrindai 2</li></a>
                            <a href="#"> <li>Skaitmeninės logikos pradmenys</li></a>

                        </td>
                    </tr>

                </table>



                <table class="forumTable">
                    <tr><h2>2 Semestras</h2></tr>
                    <tr>
                        <td>Kodas</td>
                        <td>Dalyko pavadinimas</td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#"><li>P190B101</li></a>
                            <a href="#"><li>P130B002</li></a>
                            <a href="#"><li>P175B502</li></a>
                            <a href="#"> <li>P175B100</li></a>

                        </td>
                        <td class="moduleAlignment">

                            <a href="#"><li>Fizika 1</li></a>
                            <a href="#"><li>Matematika 2</li></a>
                            <a href="#"><li>Objektinio programavimo pagrindai 2</li></a>
                            <a href="#"> <li>Skaitmeninės logikos pradmenys</li></a>

                        </td>
                    </tr>

                </table>
                <table class="forumTable">
                    <tr><h2>2 Semestras</h2></tr>
                    <tr>
                        <td>Kodas</td>
                        <td>Dalyko pavadinimas</td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#"><li>P190B101</li></a>
                            <a href="#"><li>P130B002</li></a>
                            <a href="#"><li>P175B502</li></a>
                            <a href="#"> <li>P175B100</li></a>

                        </td>
                        <td class="moduleAlignment">

                            <a href="#"><li>Fizika 1</li></a>
                            <a href="#"><li>Matematika 2</li></a>
                            <a href="#"><li>Objektinio programavimo pagrindai 2</li></a>
                            <a href="#"> <li>Skaitmeninės logikos pradmenys</li></a>

                        </td>
                    </tr>

                </table>
                <table class="forumTable">
                    <tr><h2>2 Semestras</h2></tr>
                    <tr>
                        <td>Kodas</td>
                        <td>Dalyko pavadinimas</td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#"><li>P190B101</li></a>
                            <a href="#"><li>P130B002</li></a>
                            <a href="#"><li>P175B502</li></a>
                            <a href="#"> <li>P175B100</li></a>

                        </td>
                        <td class="moduleAlignment">

                            <a href="#"><li>Fizika 1</li></a>
                            <a href="#"><li>Matematika 2</li></a>
                            <a href="#"><li>Objektinio programavimo pagrindai 2</li></a>
                            <a href="#"> <li>Skaitmeninės logikos pradmenys</li></a>

                        </td>
                    </tr>

                </table>
                <table class="forumTable">
                    <tr><h2>2 Semestras</h2></tr>
                    <tr>
                        <td>Kodas</td>
                        <td>Dalyko pavadinimas</td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#"><li>P190B101</li></a>
                            <a href="#"><li>P130B002</li></a>
                            <a href="#"><li>P175B502</li></a>
                            <a href="#"> <li>P175B100</li></a>

                        </td>
                        <td class="moduleAlignment">

                            <a href="#"><li>Fizika 1</li></a>
                            <a href="#"><li>Matematika 2</li></a>
                            <a href="#"><li>Objektinio programavimo pagrindai 2</li></a>
                            <a href="#"> <li>Skaitmeninės logikos pradmenys</li></a>

                        </td>
                    </tr>

                </table>-->
                <!--</div>-->

            </div>
        </div>
    </section>






    <!--</div>-->

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